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

use App\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/post/{id}', 'PostController@index');
Route::get('/posts', function(){
	$posts = Post::all();

	return view('posts', compact('posts'));
});

Route::post('/posts/store', 'PostController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts/create', function(){
	return view('post-create');
})->middleware('auth');