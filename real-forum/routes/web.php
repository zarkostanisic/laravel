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
	$discusions = Discusion::latest();
	
	if(request('filter')){
		$filter = request('filter');

		switch($filter){
			case 'me': 
				$discusions = $discusions->where('user_id', auth()->user()->id);
				break;
			case 'solved': 
				// $discusions = $discusions->join('replies', 'discusions.id', '=', 'replies.discusion_id')->select('discusions.*')->where('replies.best_answer', 1);
				$discusions = $discusions->with('replies')->whereHas('replies', function($query){
					$query->where('best_answer', 1);
				});
				break;
			case 'usolved': 
				// $discusions = $discusions->join('replies', 'discusions.id', '=', 'replies.discusion_id')->select('discusions.*')->where('replies.best_answer', 1);
				$discusions = $discusions->with('replies')->whereHas('replies', function($query){
					$query->where('best_answer', 0);
				});
				break;
		}
	}

	$discusions = $discusions->paginate(1);

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
Route::post('/discusion/watch/{id}', 'ForumController@watch')->name('discusion.watch');
Route::post('/discusion/unwatch/{id}', 'ForumController@unwatch')->name('discusion.unwatch');

Route::post('/reply/like/{id}', 'ForumController@like')->name('reply.like');
Route::post('/reply/unlike/{id}', 'ForumController@unlike')->name('reply.unlike');
Route::post('/reply/best_answer/{id}', 'ForumController@best_answer')->name('reply.best_answer');
Route::post('/reply/best_answer_revise/{id}', 'ForumController@best_answer_revise')->name('reply.best_answer_revise');
