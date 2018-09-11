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

// Route::get('main', function () {
// 	//$url = route('user');
// 	// $url = route('user_with_id', ['id' => 1]);
// 	$url = route('admin.test');
// 	echo $url;

// 	return redirect($url);
// 	// return redirect()->route('testiram');
// });

// Route::get('test', function(){
// 	dd('test');
// });

// Route::match(['get', 'post'], 'test', function(){
// 	dd('test');
// });

// Route::any('/test', function(){
// 	dd('test');
// });

//Route::redirect('/', '/test', 301);

// Route::get('/user/{id}', function($id){
// 	dd('User ' . $id);
// });

// Route::get('/user/{id?}', function($id = null){
// 	dd('User ' . $id);
// });

// Route::get('/user/{user}/comment/{comment}', function($userId, $commentId){
// 	dd('User ' . $userId . ", Comment " .$commentId);
// });

// Route::get('/user/{id}', function($id){
// 	echo "true";
// })->where(['id' => '[A-z]']);

// Route::get('/user/{id}/name/{name}', function($id, $name){
// 	echo "true";
// })->where(['id' => '[0-9]+', 'name' => '[A-z]+']);

// pattern for id defined in RouteserviceProvider.php
// Route::get('/user/{id}/name/{name}', function($id, $name){
// 	echo "true";
// })->where(['name' => '[A-z]+']);

// Route::get('/user', function(){
// 	echo 'user';
// })->name('user');

// Route::get('/user/{id}', function($id){
// 	echo 'user_with_id = ' . $id;
// })->name('user_with_id');

// Route::middleware(['web'])->group(function(){
// 	Route::get('test', function(){
// 		echo "as";
// 	});
// });

// Route::prefix('admin')->group(function(){
// 	Route::get('test', function(){
// 		echo 'test';
// 	});
// });

// Route::name('admin.')->group(function(){
// 	Route::get('test', function(){
// 		echo 'test';
// 	})->name('test');
// });

// Route::get('/user/{user}', function (App\User $user) {
//     return $user->email;
// })->middleware(['checkAge', /*'auth'*/]);

// use \App\Http\Middleware\CheckAge;
// Route::get('/user/{user}', function (App\User $user) {
//     return $user->email;
// })->middleware(CheckAge::class);

// Route::group(['middleware' => ['checkAge']], function(){
// 	Route::get('/test', function(){
// 		echo 'test';
// 	});
// });

// Route::get('/test', function(){
// 	echo 'test';
// })->middleware(['checkRole:editor']);

// Route::get('/csrf', function(){
// 	return view('csrf');
// });

// Route::post('/csrf_submit', function(){
// 	echo "as";
// 	//return view('csrf');
// })->name('csrf_submit');

// Route::get('/users', 'User\UserController@index');

// Route::get('/users/{id}', 'User\UserController@show');

Route::get('/photos/popular', 'PhotoController@popular');

Route::resource('photos', 'PhotoController');
// Route::apiResource('photos', 'PhotoController');




// Route::get('/profile/{id}', 'ShowProfile');