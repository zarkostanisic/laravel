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

Route::middleware('test')->get('/custom', function () {
    // dd(config('app.developers'));
    // dd(config('blog.administrators'));
    // dd(env('APP_CREATOR'));
    // dd(config('blog.creator'));
    // dd(resolve('medium-php-sdk'));
    // dd(session()->get('test'));
    throw new \App\Exceptions\HackerAlertException;

});

Route::get('/user/{id}', function($id){
	return App\User::findOrFail($id);
});

Auth::routes(['verify' => true]);

// Route::get('/register', function(){
// 	return 'register user';
// });

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
