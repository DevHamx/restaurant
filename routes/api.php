<?php

use Illuminate\Http\Request;
use App\Category;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('categories', function(Request $request){
	return Category::whereIsRoot()->orderBy('updated_at','desc')->get();   
});

Route::get('restaurants/{cat_id}', function(Request $request, $cat_id){
	$cat = Category::find($cat_id);
	return $cat->restaurants;
});