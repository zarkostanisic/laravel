<?php

use App\Staff;
use App\Image;

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
Route::get('/create', function(){
	$staff = Staff::find(1);

	$staff->images()->create(['path' => 'example.jpg']);

});

//read
Route::get('/read', function(){
	$staff = Staff::find(1);

	foreach($staff->images as $image){
		echo $image->path . '<br/>';
	}

});

//update
Route::get('/update', function(){
	$staff = Staff::find(1);

	$image = $staff->images()->whereId(1)->first();
	$image->path = 'example.jpg';

	$image->save();


});

//delete
Route::get('/delete', function(){
	$staff = Staff::find(1);

	//$staff->images()->whereId(1)->delete();
	$staff->images()->delete();


});

//assign
Route::get('/assign', function(){
	$staff = Staff::find(1);

	$image = Image::find(8);

	$staff->images()->save($image);

});

//unassign
Route::get('/unassign', function(){
	$staff = Staff::find(1);

	$staff->images()->whereId(8)->update(['imageable_id' => '', 'imageable_type' => '']);

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
