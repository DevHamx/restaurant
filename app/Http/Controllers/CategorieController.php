<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Yajra\DataTables\Datatables;

use JsValidator;

class CategorieController extends Controller
{
    protected $validationRules = [
        'name' => ['required', 'string', 'max:191'],   
    ];

    public function index()
    {
        $validator = JsValidator::make($this->validationRules);
        $categories = Category::whereIsRoot()->pluck('name', 'id');
        return view('pages.category')->with([
            'validator'=>$validator,
            'categories'=>$categories
            ]);
    }

    
    public function categoryOperations(Request $request)
    {
        switch ($request->input('action')) {
            case 'Ajouter':
            $this->validate($request,[
                'name' => ['required', 'string', 'max:191','unique:categories'],
            ]);
            $category = new Category();
            $this->updateOrAddCategory($request,$category);            
            return \redirect('/category')->with('success','La Categorie a été ajouté avec succès.');
            break;
    
            case 'Modifier':
                $this->validate($request,[
                    'id' => ['required','exists:categories'],
                ]);
            $category = Category::where('id',$request->input('id'))->first();
            $this->validate($request,[
                'name' => ['required', 'string', 'max:191','unique:categories,name,'.$category->id],
            ]);
                
            if (strcmp($name_category=$this->updateOrAddCategory($request,$category),'0')!=0) {
                return \redirect('/compagnies')->with('error','la sous categore avec le nom: '.$name_category.' ne peut pas être supprimé car elle est lié au moins à une restaurant.');                
            }
            else                      
            return \redirect('/category')->with('success','La Categorie : '.$request->input('name').' a été modifié avec succès.');
               break;
    
            case 'Supprimer':
            $this->validate($request,[
                'id' => ['required','exists:categories'],
            ]);  
            $category = Category::where('id',$request->input('id'))->first();
            if ($request->input('sousC')==0) {
                //parent
                foreach ($category->descendants as $categoryItem) {
                    if ($categoryItem->restaurants()->exists()) {
                        return \redirect('/category')->with('error','La categorie parentale avec le nom: '.$request->input('name').' ne peut pas etre supprimé car sa sous categorie: '.$categoryItem->name.' est lié au moins à une restaurant.');
                    }
                }
            }
            else{
                //child
                if ($category->restaurants()->exists()) {
                    return \redirect('/category')->with('error','la sous categorie avec le nom: '.$request->input('name').' ne peut pas etre supprimé car elle est lié au moins à une restaurant.');
                }
            }
            $category->delete();
            return \redirect('/category')->with('success','La Categorie : '.$request->input('name').' a été supprimer avec succès.');
            break;

        }
    }
    public function getSousCategoriesData(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::hasParent()->orderBy('updated_at','desc')->get();                        
            return Datatables::of($categories)
            ->addColumn('parent_name',function(Category $categorie){
                $parentName=$categorie->parent_id!=null?Category::find($categorie->parent_id)->name:null;
                return $parentName;
            })
            
            ->make(true);
        }
    }

    public function getCategoriesParentaleData(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::whereIsRoot()->orderBy('updated_at','desc')->get();                        
            return Datatables::of($categories)
            ->addColumn('sousCategories',function(Category $categorie){
                $sousCategoriesSelect = $categorie->descendants->pluck('name')->toArray();;
                    return implode(",",$sousCategoriesSelect);
            })
            
            ->make(true);
        }
    }

    public function getSousCategories($id)
    {
        $sousCategoriesSelect=Category::descendantsOf($id)->pluck('name', 'id');
        return \json_encode($sousCategoriesSelect);
    }

    public function updateOrAddCategory(Request $request, $category)
    {
        $category->name=$request->input('name');
        if ($request->input('sousC')==0) {
            //parent
            $category->saveAsRoot();
            $sousCategories = $category->descendants;
            for ($i=0; $i < sizeof($sousCategories); $i++) { 
                if ($sousCategories[$i]->restaurants->count()!=0) {
                    $sousCategoryExist=false;
                    for ($j=0; $j < sizeof($sousCategoriesSelect); $j++) { 
                        if (strcmp($sousCategories[$i]->name,$sousCategoriesSelect[$j])==0) {
                            $sousCategoryExist=true;
                            break;
                        }
                    }
                    if (!$sousCategoryExist) 
                        return $sousCategories[$i]->name;                    
                }
                else
                    $sousCategories[$i]->delete();
            }
            for ($i=0; $i < sizeof($sousCategoriesSelect); $i++) { 
                $selectedCategory=null;
                $selectedCategory = Category::where('name',$sousCategoriesSelect[$i])->first();
                if ($selectedCategory==null){
                    $selectedCategory = new Category();
                    $selectedCategory->name=$sousCategoriesSelect[$i];
                    $category->appendNode($selectedCategory);
                }
                else{
                    //$selectedCategory->name=$sousCategoriesSelect[$i];
                    $selectedCategory->save();
                }
            } 


        } else {
            //child
            $parent = Category::find($request->input('categories'));
            $parent->appendNode($category);
        }
        return '0';         
    }
}
