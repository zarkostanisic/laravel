<?php

use App\User;
use App\Role;

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

Route::get('/', function () {
    return view('welcome');
});

//create
Route::get('/create', function(){
	$user = User::find(1);

	$role = new Role();
	$role->name = 'administrator';

	$user->roles()->save($role);
});

//read
Route::get('/read', function(){
	$user = User::find(1);

	foreach($user->roles as $role){
		echo $role->name . "<br/>";
	}
});

//update
Route::get('/update', function(){
	$user = User::find(1);

	if($user->has('roles')){
		foreach($user->roles as $role){
			if($role->name == 'administrator'){
				$role->name = 'admin';

				$role->save();
			}
		}
	}
});

//update
Route::get('/delete', function(){
	$user = User::find(1);

	$user->roles()->delete();
	// if($user->has('roles')){
	// 	foreach($user->roles as $role){
	// 		$role->whereId(23)->delete();
	// 	}
	// }
});

//attach
Route::get('/attach', function(){
	$user = User::find(1);

	$user->roles()->attach(1);
});

//deattach
Route::get('/detach', function(){
	$user = User::find(1);

	$user->roles()->detach(1);
});

//sync
Route::get('/sync', function(){
	$user = User::find(1);

	$user->roles()->sync([22]);
});

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
    //
});
