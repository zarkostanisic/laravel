<?php

use App\User;
use App\Post;

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
// Route::get('/create', function () {
// 	$user = User::findOrFail(1);

// 	$post = new Post;
// 	$post->title = 'title1';
// 	$post->body = 'body1';
	
// 	$user->posts()->save($post);
// });

//read
Route::get('/read', function () {
	$user = User::findOrFail(1);

	foreach($user->posts as $post){
		echo $post->title . '<br/>';
	}
});

//update
Route::get('/update', function () {
	$user = User::findOrFail(1);

	$user->posts()->whereId(1)->update(['title' => 'titleu1', 'body' => 'bodyu1']);
});

//delete
Route::get('/delete', function () {
	$user = User::findOrFail(1);

	$user->posts()->whereId(1)->delete();
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
