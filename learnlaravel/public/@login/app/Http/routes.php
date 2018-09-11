<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	Route::get('/', function () {
    	//return view('welcome');
    	// if(Auth::check()){
    	// 	echo 'the user is logged in';
    	// }
    	// $name = 'test';
    	// $password = '123';

    	// if(Auth::attempt(['name' => $name, 'password' => $password])){
    	// 	return redirect()->intended();
    	// }

    	Auth::logout();
	});

    Route::auth();

	Route::get('/home', 'HomeController@index');
});
