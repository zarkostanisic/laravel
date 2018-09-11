<?php

use Illuminate\Support\Facades\Mail;

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

Route::get('/send', function () {
    $data = [
    	'title' => 'hi',
    	'content' => 'i am zarko'
    ];

    Mail::send('emails.test', $data, function($message){
    	$message->to('zarko.stanisic.va@gmail.com', 'zarko');
    	$message->subject('Hello i am testing');
    });
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
