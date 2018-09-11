<?php
use App\Post;
use App\User;
use App\Role;
use App\Country;
use App\Image;
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

/*
|--------------------------------------------------------------------------
| ELOQUENT relation one to one - get user  one post
| App\User - post()
|--------------------------------------------------------------------------
*/
Route::get('/user/{id}/post', function($id){
	$user = User::find($id);
	 return $user->post;
});

/*
|--------------------------------------------------------------------------
| ELOQUENT relation one to one - inverse - get post user
| App\Post - user()
|--------------------------------------------------------------------------
*/
Route::get('/post/{id}/user', function($id){
	$post = Post::find($id);
	 return $post->user;
});

/*
|--------------------------------------------------------------------------
| ELOQUENT relation one to many - get user posts
| App\User - posts()
|--------------------------------------------------------------------------
*/
Route::get('/user/{id}/posts', function($id){
	$user = User::find($id);
	
	foreach($user->posts as $post){
		echo $post->title . "<br/>";
	}
});

/*
|--------------------------------------------------------------------------
| ELOQUENT relation many to many - get user roles
| App\User - roles()
|--------------------------------------------------------------------------
*/
Route::get('/user/{id}/roles', function($id){
	$user = User::find($id);
	
	foreach($user->roles as $role){
		echo $role->name . "<br/>";
	}
});

/*
|--------------------------------------------------------------------------
| ELOQUENT relation many to many - get user roles
| App\Role - users()
|--------------------------------------------------------------------------
*/
Route::get('/role/{id}/users', function($id){
	$role = Role::find($id);
	
	foreach($role->users as $user){
		echo $user->name . "<br/>";
	}
});

/*
|--------------------------------------------------------------------------
| ELOQUENT relation many to many - get information from pivot table
| App\Role - roles()->withPivot('created_at')
|--------------------------------------------------------------------------
*/
Route::get('/user/{id}/pivot', function($id){
	$user = User::find($id);
	
	foreach($user->roles as $role){
		echo "<strong>" . $role->name . "</strong>" . " created at:" . $role->pivot->created_at . "<br/>";
	}
});

/*
|--------------------------------------------------------------------------
| ELOQUENT has many through relations - get post for country through user table
| App\Country - posts()
|--------------------------------------------------------------------------
*/
Route::get('/user/country/{id}', function($id){
	$country = Country::find($id);
	
	foreach($country->posts as $post){
		echo $post->title . "<br/>";
	}
});

/*
|--------------------------------------------------------------------------
| ELOQUENT POLYMORPHIC relations - one to many - one table with post and user images
| App\Post - images()
| App\User - images()
|--------------------------------------------------------------------------
*/
Route::get('/post/{id}/images', function($id){
	$post = Post::find($id);
	
	foreach($post->images as $image){
		echo $image->path . "<br/>";
	}
});

Route::get('/user/{id}/images', function($id){
	$user = User::find($id);
	
	foreach($user->images as $image){
		echo $image->path . "<br/>";
	}
});

/*
|--------------------------------------------------------------------------
| ELOQUENT POLYMORPHIC relations - one to many - inverse - get owner of photo: user, post etc...
| App\Post - imagable()
|--------------------------------------------------------------------------
*/
Route::get('/image/{id}/owner', function($id){
	$image = Image::find($id);
	
	return $image->imagable;
});

/*
|--------------------------------------------------------------------------
| ELOQUENT POLYMORPHIC relations - many to many
| App\Video - tags()
| App\Post - tags()
|--------------------------------------------------------------------------
*/
Route::get('/video/{id}/tags', function($id){
	$video = Video::find($id);
	
	return $video->tags;
});

Route::get('/post/{id}/tags', function($id){
	$post = Post::find($id);
	
	return $post->tags;
});

/*
|--------------------------------------------------------------------------
| ELOQUENT POLYMORPHIC relations - many to many - inverse - get owner of tag: post, video etc...
| App\Tag - posts()
| App\Tag - videos()
|--------------------------------------------------------------------------
*/
Route::get('/tag/{id}/posts', function($id){
	$tag = Tag::find($id);
	
	return $tag->posts;
});

Route::get('/tag/{id}/videos', function($id){
	$tag = Tag::find($id);
	
	return $tag->videos;
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
