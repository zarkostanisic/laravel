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
use App\Discusion;
Route::get('/', function () {
	$discusions = Discusion::latest()->paginate(3);
    return view('index', compact('discusions'));
})->name('index');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/{provider}/auth', 'SocialsController@auth')->name('social.auth');
Route::get('/{provider}/redirect', 'SocialsController@redirect')->name('social.redirect');

Route::group(['middleware' => 'auth'], function(){
	Route::resource('channels', 'ChannelsController')->except('show');

	Route::resource('discusions', 'DiscusionsController')->except('show');
});

Route::get('/channel/{slug}', 'ForumController@channel')->name('channel');
Route::get('/discusion/{slug}', 'ForumController@discusion')->name('discusion');
Route::post('/discusion/reply/{id}', 'ForumController@reply')->name('discusion.reply');
Route::post('/reply/like/{id}', 'ForumController@like')->name('reply.like');
Route::post('/reply/unlike/{id}', 'ForumController@unlike')->name('reply.unlike');
