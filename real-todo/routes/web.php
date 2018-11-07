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
})->name('home');

Route::get('/new' , [
	'uses' => 'PagesController@new',
	'as' => 'new'
]);

Route::get('/todos' , [
	'uses' => 'TodosController@index',
	'as' => 'todos.index'
]);

Route::post('/todos/create' , [
	'uses' => 'TodosController@store',
	'as' => 'todos.create'
]);

Route::delete('/todos/{id}/delete' , [
	'uses' => 'TodosController@destroy',
	'as' => 'todos.delete'
]);

Route::get('/todos/{id}/edit' , [
	'uses' => 'TodosController@edit',
	'as' => 'todos.edit'
]);

Route::post('/todos/{id}/update' , [
	'uses' => 'TodosController@update',
	'as' => 'todos.update'
]);

Route::get('/todos/{id}/complete' , [
	'uses' => 'TodosController@complete',
	'as' => 'todos.complete'
]);
