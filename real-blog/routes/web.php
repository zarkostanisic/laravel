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

// Route::get('/test', function(){
// 	return App\Post::find(10)->tags;
// });

Route::get('/', 'FrontEndController@index')->name('index');
Route::get('/post/{slug}', 'FrontEndController@single')->name('single');
Route::get('/category/{slug}', 'FrontEndController@category')->name('category');
Route::get('/tag/{id}', 'FrontEndController@tag')->name('tag');
Route::get('/search', 'FrontEndController@search')->name('search');
Route::post('/subscribe', 'FrontEndController@subscribe')->name('subscribe');

Auth::routes();

Route::group(['prefix' => 'admin', /*'middleware' => 'auth'*/], function(){
	Route::get('/home', 'HomeController@index')->name('home');
	// Route::get('/posts/create', 'PostsController@create')->name('posts.create');
	// Route::post('/posts/store', 'PostsController@store')->name('posts.store');

	Route::get('/posts/trashed', 'PostsController@trashed')->name('posts.trashed');
	Route::post('/posts/restore/{id}', 'PostsController@restore')->name('posts.restore');
	Route::delete('/posts/remove/{id}', 'PostsController@remove')->name('posts.remove');

	Route::resource('posts', 'PostsController');

	Route::resource('categories', 'CategoriesController');

	Route::resource('tags', 'TagsController');

	Route::post('/users/admin/{id}', 'UsersController@admin')->name('users.admin');
	Route::resource('users', 'UsersController');

	Route::get('/settings', 'SettingsController@edit')->name('settings.edit')->middleware('admin');
	Route::patch('/settings', 'SettingsController@update')->name('settings.update')->middleware('admin');
});
