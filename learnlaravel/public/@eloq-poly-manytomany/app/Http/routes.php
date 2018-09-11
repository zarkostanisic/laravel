<?php

use App\Post;
use App\Video;
use App\Tag;

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
	$tag1 = Tag::find(1);

	$post = Post::create(['name' => 'post1']);
	$post->tags()->save($tag1);

	$tag2 = Tag::find(2);

	$video = Video::create(['name' => 'video1']);
	$video->tags()->save($tag2);
});

//read
Route::get('/read', function(){
	$post = Post::find(16);

	foreach($post->tags as $tag){
		echo $tag->name . '<br/>';
	}
});

//update
Route::get('/update', function(){
	//$post = Post::find(16);

	// foreach($post->tags as $tag){
	// 	return $tag->whereId(1)->update(['name' => 'tag1']);
	// }

	//insert
	//$tag = Tag::find(3);
	//$post = Post::find(16);

	//$post->tags()->save($tag);

	//attach
	//$tag = Tag::find(3);
	//$post = Post::find(16);
	//$post->tags()->attach($tag);

	//sync
	$post = Post::find(16);
	$post->tags()->sync([1]);
});

//delete
Route::get('/delete', function(){
	$post = Post::find(16);

	foreach($post->tags as $tag){
		return $tag->whereId(1)->delete();
	}
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
