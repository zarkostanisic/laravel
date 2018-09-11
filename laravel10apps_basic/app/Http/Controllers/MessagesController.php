<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    public function submit(Request $request){
    	$this->validate($request, [
    		'title' => 'required',
    		'email' => 'required',
    		'body' => 'required'
    	]);

    	$message = new Message();
    	$message->title = $request->input('title');
    	$message->email = $request->input('email');
    	$message->body = $request->input('body');

    	$message->save();

    	return redirect('/')->with('success', 'Message Sent');
    }

    public function getMessages(){
    	$messages = Message::all();

    	return view('messages', compact('messages'));
    }
}
