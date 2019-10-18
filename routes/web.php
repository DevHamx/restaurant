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
Route::get('category/getData', 'CategorieController@getData')->name('category.getData');
Route::get('restaurant', 'RestaurantsController@index')->name('category');
Route::post('restaurant/operation', 'RestaurantsController@restaurantOperations');
Route::get('restaurant/getData', 'RestaurantsController@getData')->name('restaurant.getData');
Route::get('restaurant/getCategories/{id}', 'RestaurantsController@getCategories')->name('restaurant.getCategories');
Route::get('/', 'HomeController@index')->name('home');
