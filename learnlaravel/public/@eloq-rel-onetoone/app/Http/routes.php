<?php
use App\User;
use App\Address;

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
// Route::get('/create', function(){
// 	$user = User::findOrFail(1);

// 	$address = new Address;
// 	$address->name = '1234 TO';

// 	$user->address()->save($address);
// });

//read
Route::get('/read', function(){
	$user = User::findOrFail(1);

	return $user->address->name;
});

//update
Route::get('/update', function(){
	$address = Address::whereUserId(1)->first();
	$address->name = '4321 NY';
	
	$address->save();
});

//delete
Route::get('/delete', function(){
	$user = User::findOrFail(1);

	$user->address()->delete();
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
