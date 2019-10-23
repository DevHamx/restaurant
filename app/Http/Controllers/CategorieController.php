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
        return view('pages.category')->with('validator',$validator);
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
            
            $this->updateOrAddCategory($request,$category);                          
            return \redirect('/category')->with('success','La Categorie a été modifié avec succès.');
               break;
    
            case 'Supprimer':
            $this->validate($request,[
                'id' => ['required','exists:categories'],
            ]);  
            $category = Category::where('id',$request->input('id'))->first();
            $category->delete();
            return \redirect('/category')->with('success','La Categorie : '.$request->input('name').' a été supprimer avec succès.');
            break;

        }
    }
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::orderBy('updated_at','desc')->get();                        
            return Datatables::of($categories)->make(true);
        }
    }

    public function updateOrAddCategory(Request $request, $category)
    {
        $category->name=$request->input('name');
        $category->save();            
    }
}
