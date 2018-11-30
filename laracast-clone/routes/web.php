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

Route::get('/redis', function(){
	// Redis::set('test_key', 'test_value');
	// dd(Redis::get('test_key'));

	// Redis::lpush('test_key_list', [1, 2, 3]);
	// dd(Redis::lrange('test_key_list', 0, -1));

	Redis::sadd('test_key_sadd', [1, 2, 3]);
	dd(Redis::smembers('test_key_sadd'));
});

Route::get('/', 'FrontendController@welcome');
Route::get('/series/{series}', 'FrontendController@series')->name('series');
Route::get('/watch-series/{series}/', 'WatchSeriesController@index')->name('watch-series');
Route::get('/watch-series/{series}/{lesson}', 'WatchSeriesController@watch')->name('series.watch');

Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/register/confirm', 'Auth\RegisterController@confirm')->name('register.confirm');

Route::post('/logout', 'Auth\LoginController@logout');

// Route::get('/mail', function(){
// 	return new App\Mail\ConfirmYourEmail();
// });