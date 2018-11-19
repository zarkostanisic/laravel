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

Route::get('/', function () {
	$products = App\Product::latest()->paginate(5);
    return view('welcome', compact('products'));
});

Route::resource('products', 'ProductsController');
Route::resource('categories', 'CategoriesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cart', 'CartController@show')->name('cart.show');
Route::post('/cart/add/{id}', 'CartController@add')->name('cart.add');
Route::delete('/cart/remove/{uniqueId}', 'CartController@remove')->name('cart.remove');
Route::delete('/cart/clear', 'CartController@clear')->name('cart.clear');
Route::post('/cart/checkout', 'CartController@checkout')->name('cart.checkout');
