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
    return view('welcome');
});

Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/register/confirm', 'Auth\RegisterController@confirm')->name('register.confirm');

Route::post('/logout', 'Auth\LoginController@logout');

// Route::get('/mail', function(){
// 	return new App\Mail\ConfirmYourEmail();
// });

Route::prefix('admin')->middleware('administrator')->group(function(){
	Route::resource('series', 'SeriesController');
});