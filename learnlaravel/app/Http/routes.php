<?php
use App\Post;
use App\User;
use App\Country;
use App\Photo;
use App\Video;
use App\Tag;

use Carbon\Carbon;

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Get route list in terminal
|--------------------------------------------------------------------------
| php artisan route:list
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Index route
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
	/*$value = Cache::remember('users', 30, function(){
	    return DB::table('users')->get();
	});*/
	$key = 'users1234';
	$users = Cache::get($key);

	if($users === NULL){
		echo "cache" . "<br/>";
		$users = Cache::remember($key, 1, function(){
	    	return DB::table('users')->get();
		});

		for($i=0;$i<1000000;$i++){
			echo $i;
		}
	}

    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Basic route
|--------------------------------------------------------------------------
*/
// Route::get('/contact', function () {
// 	return "Hi contact page";
// });

/*
|--------------------------------------------------------------------------
| Basic route with params
|--------------------------------------------------------------------------
*/
// Route::get('/post/{id}/{name}', function ($id, $name) {
// 	return "This is post number ". $id . " " . $name;
// });

/*
|--------------------------------------------------------------------------
| Basic named route
|--------------------------------------------------------------------------
*/
// Route::get('/admin/home', array('as' =>  'admin.home', function () {
// 	$url = route('admin.home');

// 	return "This route is " . $url;
// })); 

/*
|--------------------------------------------------------------------------
| Route calls controller and pass params
|--------------------------------------------------------------------------
*/
//Route::get('/post/{id}', 'PostsController@index');

/*
|--------------------------------------------------------------------------
| Route resource. Methods: geet, post, update, etc.
|--------------------------------------------------------------------------
+--------+-----------+--------------------+---------------+----------------------------------------------+------------
|        | GET|HEAD  | posts              | posts.index   | App\Http\Controllers\PostsController@index   | web 
|        | POST      | posts              | posts.store   | App\Http\Controllers\PostsController@store   | web 
|        | GET|HEAD  | posts/create       | posts.create  | App\Http\Controllers\PostsController@create  | web 
|        | GET|HEAD  | posts/{posts}      | posts.show    | App\Http\Controllers\PostsController@show    | web 
|        | PUT|PATCH | posts/{posts}      | posts.update  | App\Http\Controllers\PostsController@update  | web 
|        | DELETE    | posts/{posts}      | posts.destroy | App\Http\Controllers\PostsController@destroy | web 
|        | GET|HEAD  | posts/{posts}/edit | posts.edit    | App\Http\Controllers\PostsController@edit    | web 
+--------+-----------+--------------------+---------------+----------------------------------------------+------------
*/
//Route::resource('/posts', 'PostsController');

/*
|--------------------------------------------------------------------------
| Route call controller which call view
|--------------------------------------------------------------------------
*/
// Route::resource('/contact', 'PostsController@contact');

/*
|--------------------------------------------------------------------------
| Route call controller which call view and pass data to view
|--------------------------------------------------------------------------
*/
// Route::get('/posts/{id}/{name}', 'PostsController@showPost');

/*
|--------------------------------------------------------------------------
| DATABASE RAW SQL QUERIES
|--------------------------------------------------------------------------
*/

// Route::get('/insert', function(){
// 	DB::insert('INSERT INTO posts(title, body) VALUES(?, ?)', ['title 1', 'body 1']);
// });

// Route::get('/select/{id}', function($id){
// 	//dd($id);
// 	$results = DB::select('SELECT * FROM posts WHERE id = ?', [$id]);

// 	//dd($results);

// 	// foreach($results as $post){
// 	// 	return $post->title;
// 	// }

// 	dd($results[0]->title);
// });

// Route::get('/update/{id}', function($id){
// 	//dd($id);

// 	$updated = DB::update('UPDATE posts SET title = "title changed 1" WHERE id = ?', [$id]);

// 	return $updated;

// });

// Route::get('/delete/{id}', function($id){
// 	//dd($id);

// 	$deleted = DB::update('DELETE FROM posts WHERE id = ?', [$id]);

// 	return $deleted;

// });

/*
|--------------------------------------------------------------------------
| DATABASE ELOQUENT
|--------------------------------------------------------------------------
*/
// Route::get('/selectEloq', function(){
// 	$posts = Post::all();
	
// 	//dd($posts);

// 	foreach($posts as $post){
// 		echo $post->title."<br/>";
// 	}
// });

// Route::get('/selectEloq/{id}', function($id){

// 	$post = Post::find($id);

// 	return $post->title;
// });

// Route::get('/selectEloqWhere/{order}', function($order){
// 	$posts = Post::where('is_admin', 0)->orderBy('title', $order)->take(1)->get();

// 	return $posts;
// });

// Route::get('/selectEloqMore', function(){
// 	//$posts = Post::findOrFail(1);

// 	$posts = Post::where('id', '>', 2)->firstOrFail();
// 	return $posts;
// });

// Route::get('/insertEloq/{title}/{body}', function($title, $body){
// 	$post = new Post;

// 	$post->title = $title;
// 	$post->body = $body;

// 	//dd($post); 

// 	$post->save();

// });

// Route::get('/insertUpdateEloq/{id}/{title}/{body}', function($id, $title, $body){
// 	$post = Post::find($id);

// 	$post->title = $title;
// 	$post->body = $body;

// 	//dd($post); 

// 	$post->save();

// });

// Route::get('/insertMassAssignmentEloq', function(){
// 	Post::create(['title' => 'title 6', 'body' => 'body 6']);
// });

// Route::get('/updateEloq', function(){
// 	Post::where('id', 3)->update(['title' => 'title 3 update', 'body' => 'body 3 update']);
// });

// Route::get('/deleteEloq', function(){
// 	$post = Post::find(5);

// 	$post->delete();
// });

// Route::get('/deleteDestroyEloq', function(){
// 	//Post::destroy(9);
// 	//Post::destroy([10, 11]);
// 	Post::where('id', 12)->delete();
// });

// Route::get('/deleteSoft', function(){
// 	Post::find(13)->delete();
// });

// Route::get('/retreiveDeleteSoft', function(){
// 	// $post = Post::find(13);

// 	// return $post;

// 	//$post = Post::withTrashed()->where('id', 13)->get();

// 	$post = Post::onlyTrashed()->where('id', 13)->get();

// 	return $post;
// });

// Route::get('/restoreDeleteSoft', function(){
// 	$post = Post::onlyTrashed()->where('id', 13)->restore();
// });

// Route::get('/permanentlySoftDelete', function(){
// 	Post::onlyTrashed()->where('id', 13)->forceDelete();
// });

/*
|--------------------------------------------------------------------------
| DATABASE ELOQUENT RELATIONSHIP
|--------------------------------------------------------------------------
*/

// //one to one - hasOne - user has post
// Route::get('/user/{id}/post', function($id){
// 	//return User::find($id)->post;
// 	return User::find($id)->post->title;
// });

// //one to one - inverse - get user who created post
// Route::get('/post/{id}/user', function($id){
// 	//return User::find($id)->post;
// 	return Post::find($id)->user->email;
// });

// //one to many - user has many posts
// Route::get('/user/{id}/posts', function($id){
// 	$user = User::find($id);

// 	foreach($user->posts as $post){
// 		echo "<strong>" . $post->user->email . "</strong>" . " " . $post->title . "<br/>";
// 	}
// });

// // many to many
// Route::get('/user/{id}/roles', function($id){
// 	$user = User::find($id);

// 	foreach($user->roles as $role){
// 		echo $role->name . "<br/>";
// 	}
// });

// // many to many - pivot - get information from pivot table
// Route::get('/user/{id}/pivot', function($id){
// 	$user = User::find($id);

// 	foreach($user->roles as $role){
// 		dd($role->pivot->created_at);
// 	}
// });

// // has many through relations
// Route::get('/user/country/{id}', function($id){
// 	$country = Country::find($id);

// 	echo $country->name . "<br/>";

// 	foreach($country->posts as $post){
// 		echo $post->title . "<br/>";
// 	}
// });

// // polymorphic relations - one table with user and post photos
// Route::get('/user/{id}/photos', function($id){
// 	$user = User::find($id);

// 	foreach($user->photos as $photo){
// 		echo $photo->path . "<br/>";
// 	}
// });

// Route::get('/post/{id}/photos', function($id){
// 	$post = Post::find($id);

// 	foreach($post->photos as $photo){
// 		echo $photo->path . "<br/>";
// 	}
// });

// // polymorphic relations - inverse - get owner of photo: user, post etc...
// Route::get('/photo/{id}/owner', function($id){
// 	$photo = Photo::findOrFail($id);

// 	return $photo->imagable;
// });

// // polymorphic relations - many to many
// Route::get('/post/{id}/tag', function($id){
// 	$post = Post::find($id);
	
// 	foreach($post->tags as $tag){
// 		echo $tag->id . " " . $tag->name . "<br/>";
// 	}
// });

// Route::get('/video/{id}/tag', function($id){
// 	$video = Video::find($id);
	
// 	foreach($video->tags as $tag){
// 		echo $tag->id . " " . $tag->name . "<br/>";
// 	}
// });
// // polymorphic relations - many to many - inverse - get owner of tag: post, video etc...
// Route::get('/tag/{id}/posts', function($id){
// 	$tag = Tag::find($id);

// 	foreach($tag->posts as $post){
// 		echo $post->title . "<br/>";
// 	}
// });

// Route::get('/tag/{id}/videos', function($id){
// 	$tag = Tag::find($id);

// 	foreach($tag->videos as $video){
// 		echo $video->name . "<br/>";
// 	}
// });


/*
|--------------------------------------------------------------------------
| CRUD APPLICATION
|--------------------------------------------------------------------------
*/
Route::resource('/posts', 'PostsController');

/*
|--------------------------------------------------------------------------
| DATES
|--------------------------------------------------------------------------
*/
Route::get('/dates', function(){
	$date = new DateTime('+1 week');
	echo $date->format('Y-m-d');

	echo '<hr>';

	echo Carbon::now() . '<br/>';
	echo Carbon::now()->addDays(4)->diffForHumans() . '<br/>';
	echo Carbon::now()->subDays(5)->diffForHumans(). '<br/>';
	echo Carbon::yesterday() . '<br/>';
	echo Carbon::now()->yesterday()->diffForHumans() . '<br/>';

});

/*
|--------------------------------------------------------------------------
| ACCESSORS
|--------------------------------------------------------------------------
*/
Route::get('/accessors', function(){
	$post = Post::find(1);

	echo $post->title;
});

/*
|--------------------------------------------------------------------------
| MUTATORS
|--------------------------------------------------------------------------
*/
Route::get('/mutators', function(){
	$post = Post::find(1);

	$post->title = 'blabla';

	$post->save();
});

/*
|--------------------------------------------------------------------------
| SCOPE
|--------------------------------------------------------------------------
*/
Route::get('/scope', function(){
	$posts = Post::latest();

	foreach($posts as $post){
		echo $post->title."<br/>";
	}
});

/*
|--------------------------------------------------------------------------
| SESSIONS
|--------------------------------------------------------------------------
*/
Route::get('/sessions/set', function(Request $request){
	//session set
    $request->session()->put(['test' => 'test text']);
    //without Request $request
    //session(['test' => 'test text']);
});

Route::get('/sessions/get', function(Request $request){
    //session get
    return $request->session()->get('test');
    //without Request $request
    //return(session('test'));
});

Route::get('/sessions/unset', function(Request $request){
    //session unset one
    //$request->session()->forget('test');

	//session flush
	$request->session()->flush();
    
});

Route::get('/sessions/flash', function(Request $request){
	//session flash
	$request->session()->flash('test', 'test flash');
	//$request->session()->frelash();
    //$request->session()->keep();

});
