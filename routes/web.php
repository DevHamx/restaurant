<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('category', 'CategorieController@index')->name('category');
Route::post('category/operation', 'CategorieController@categoryOperations');
Route::get('category/getSousCategoriesData', 'CategorieController@getSousCategoriesData')->name('category.getSousCategoriesData');
Route::get('category/getSousCategories/{id}', 'CategorieController@getSousCategories')->name('category.getSousCategories');
Route::get('category/getCategoriesParentaleData', 'CategorieController@getCategoriesParentaleData')->name('category.getCategoriesParentaleData');
Route::get('category/getData', 'CategorieController@getData')->name('category.getData');
Route::get('restaurant', 'RestaurantsController@index')->name('restaurant');
Route::post('restaurant/operation', 'RestaurantsController@restaurantOperations');
Route::get('restaurant/getData', 'RestaurantsController@getData')->name('restaurant.getData');
Route::get('restaurant/getCategories/{id}', 'RestaurantsController@getCategories')->name('restaurant.getCategories');
Route::get('restaurant/getMenu/{id}', 'RestaurantsController@getMenu')->name('restaurant.getMenu');
Route::get('restaurant/getMenuItems/{id}', 'RestaurantsController@getMenuItems')->name('restaurant.getMenuItems');
Route::get('restaurant/getSearchRestaurants', 'RestaurantsController@getSearchRestaurants')->name('restaurant.getSearchRestaurants');
Route::post('restaurant', 'RestaurantsController@index')->name('restaurant');
Route::get('/', 'HomeController@index')->name('home');
