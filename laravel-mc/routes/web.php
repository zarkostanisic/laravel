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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');


Auth::routes();

Route::resource('categories', 'CategoriesController');

Route::resource('categries', 'CategryController');

Route::resource('categories', 'CategoryController');

Route::resource('nominates', 'NominateController');

Route::resource('users', 'UserController');

Route::resource('nominationUsers', 'NominationUserController');

Route::resource('nominations', 'NominationController');

Route::resource('nominationUsers', 'NominationUserController');

Route::resource('roles', 'RoleController');

Route::resource('settings', 'SettingController');

Route::resource('votings', 'VotingsController');

Route::resource('votings', 'VotingController');