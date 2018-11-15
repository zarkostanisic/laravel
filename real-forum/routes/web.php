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
//dd(App::make('channels')->pluck('title'));
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{provider}/auth', 'SocialsController@auth')->name('social.auth');
Route::get('/{provider}/redirect', 'SocialsController@redirect')->name('social.redirect');

Route::group(['middleware' => 'auth'], function(){
	Route::resource('channels', 'ChannelsController')->except('show');

	Route::resource('discusions', 'DiscusionsController')->except('show');
});

Route::get('/channel/{id}', 'ForumController@channel')->name('channel');
Route::get('/discusion/{id}', 'ForumController@discusion')->name('discusion');
