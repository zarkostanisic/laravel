<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');

Route::get('/post/{id}', ['as' => 'blog.post', 'uses' => 'AdminPostsController@show']);

Route::get('/post_disqus/{id}', ['as' => 'blog.post_disqus', 'uses' => 'AdminPostsController@showDisqus']);

Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin', function(){
        return view('admin.index');
    });

    Route::resource('/admin/users', 'AdminUsersController', ['names' => [
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'edit' => 'admin.users.edit',
        'create' => 'admin.users.create',
        'show' => 'admin.users.show',
        'destroy' => 'admin.users.destroy'
    ]]);

    Route::resource('/admin/posts', 'AdminPostsController', ['names' => [
        'index' => 'admin.posts.index',
        'create' => 'admin.posts.create',
        'edit' => 'admin.posts.edit',
        'create' => 'admin.posts.create',
        'show' => 'admin.posts.show',
        'destroy' => 'admin.users.destroy'
    ]]);

    Route::resource('/admin/categories', 'AdminCategoriesController', ['names' => [
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'edit' => 'admin.categories.edit',
        'create' => 'admin.categories.create',
        'show' => 'admin.categories.show',
        'destroy' => 'admin.categories.destroy'
    ]]);

    Route::resource('/admin/media', 'AdminMediaController', ['names' => [
        'index' => 'admin.media.index',
        'create' => 'admin.media.create',
        //'edit' => 'admin.media.edit',
        'create' => 'admin.media.create',
        //'show' => 'admin.media.show',
        'destroy' => 'admin.media.destroy',
    ]]);

    Route::post('/admin/media/destroyBulk', 'AdminMediaController@destroyBulk');

    Route::resource('/admin/comments', 'PostCommentsController', ['names' => [
        'index' => 'admin.comments.index',
        'create' => 'admin.comments.create',
        'edit' => 'admin.comments.edit',
        'create' => 'admin.comments.create',
        'show' => 'admin.comments.show',
        'destroy' => 'admin.comments.destroy'
    ]]);

    Route::resource('/admin/comment/replies', 'CommentRepliesController', ['names' => [
        'index' => 'admin.comment.replies.index',
        'create' => 'admin.comment.replies.create',
        'edit' => 'admin.comment.replies.edit',
        'create' => 'admin.comment.replies.create',
        'show' => 'admin.comment.replies.show',
        'destroy' => 'admin.comments.replies.destroy'
    ]]);
});

Route::group(['middleware' => 'auth'], function(){
    Route::post('/comment/reply', 'CommentRepliesController@createReply');
});