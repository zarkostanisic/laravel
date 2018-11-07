<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Session;

class TodosController extends Controller
{
    public function index(){

    	$todos = Todo::all();

    	return view('todos', compact('todos'));
    }

    public function store(Request $request){

    	$request->validate([
    		'todo' => 'required'
    	]);

    	//Todo::create($request->all());
    	$todo = new Todo;
    	$todo->todo = $request->todo;
    	$todo->save();

    	return redirect()->back()->with('success', 'Todo has been created!');
    }

    public function edit($id){

    	$todo = Todo::find($id);
    	
    	return view('edit', compact('todo'));
    }

    public function update(Request $request, $id){

    	$request->validate([
    		'todo' => 'required'
    	]);

    	$todo = Todo::find($id);
    	
    	$todo->todo = $request->todo;

    	$todo->save();

    	return redirect()->route('todos.index')->with('success', 'Todo has been updated!');
    }

    public function destroy($id){

    	// Todo::find($id)->delete();

    	$todo = Todo::find($id);
    	$todo->delete();

    	return redirect()->back()->with('success', 'Todo has been deleted!');
    }

    public function complete($id){

    	$todo = Todo::find($id);
    	
    	$todo->completed = 1;

    	$todo->save();

    	Session::flash('success', 'Todo has been completed!');

    	return redirect()->back();
    }
}
