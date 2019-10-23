<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Category;
use App\RestaurantMenu;
use Yajra\DataTables\Datatables;
use JsValidator;

class RestaurantsController extends Controller
{
    protected $validationRules = [
        'name' => ['required', 'string', 'max:191'],   
        'bookingEmail' => ['required', 'email'],   
        'phone' => ['required'],

    ];

    public function index()
    {
        $validator = JsValidator::make($this->validationRules);
        $categories = Category::pluck("name","id");
        return view('pages.restaurant')->with([
            'validator'=>$validator,
            'categories'=>$categories
        ]);
    }

    
    public function restaurantOperations(Request $request)
    {
        switch ($request->input('action')) {
            case 'Ajouter':
            $this->validate($request,[
                'name' => ['required', 'string', 'max:191','unique:restaurants'],
                'bookingEmail' => ['required', 'email'],
                'phone' => ['required'],
            ]);
            $restaurant = new Restaurant();
            $this->updateOrAddRestaurant($request,$restaurant);            
            return \redirect('/restaurant')->with('success','La Restaurant a été ajouté avec succès.');
            break;
    
            case 'Modifier':
                $this->validate($request,[
                    'id' => ['required'],
                ]);
            $restaurant = Restaurant::where('id',$request->input('id'))->first();
            $this->validate($request,[
                'name' => ['required', 'string', 'max:191','unique:restaurants,name,'.$restaurant->id],
            ]);
            
            $this->updateOrAddRestaurant($request,$restaurant);                          
            return \redirect('/restaurant')->with('success','La Restaurant a été modifié avec succès.');
               break;
    
            case 'Supprimer':
            $this->validate($request,[
                'id' => ['required','exists:categories'],
            ]);  
            $restaurant = Restaurant::where('id',$request->input('id'))->first();
            $restaurant->categories()->detach();
            $restaurant->delete();
            return \redirect('/restaurant')->with('success','La Restaurant : '.$request->input('name').' a été supprimer avec succès.');
            break;

        }
    }
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $restaurants = Restaurant::orderBy('updated_at','desc')->get();                        
            return Datatables::of($restaurants)
            ->addColumn('name_category',function(Restaurant $restaurant){
                $categories = $restaurant->categories()->pluck('name')->toArray();
                return implode(",",$categories);
            })
            ->make(true);
        }
    }

    public function updateOrAddRestaurant(Request $request, $restaurant)
    {
        $restaurant->name=$request->input('name');
        $restaurant->bookingEmail=$request->input('bookingEmail');
        $restaurant->phone=$request->input('phone');
        $restaurant->periods=$request->input('periods');
        $categories = $request->input('categories');
        $restaurant->save();            
        if($categories!=null){
            $restaurant->categories()->detach();
            $restaurant->categories()->attach($categories);
        }

        if(count($request->input('m_item')) > 0){
            $restaurant->menuItems()->delete();
            for($i=0; $i<count($request->input('m_item')); $i++){
                if($request->input('m_item')[$i] != ''){
                    $restaurant->menuItems()->save(new RestaurantMenu(['item' => $request->input('m_item')[$i], 'price' => $request->input('m_price')[$i]]));
                }
            }
        }
    }

    public function getCategories($id_restaurant)
    {
        $categories=Restaurant::find($id_restaurant)->categories->pluck("name","id");
        return \json_encode($categories);

    }

    public function getMenu($id_restaurant){
        $menuItems=Restaurant::find($id_restaurant)->menuItems;
        return \json_encode($menuItems);
    }

}
