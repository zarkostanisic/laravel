<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use App\Discusion;
use App\Reply;
use Auth;

class ForumController extends Controller
{
    public function channel($id){
    	$channel = Channel::with(['discusions', 'discusions.user'])->where('id', $id)->first();
        $discusions = $channel->discusions()->latest()->paginate(2);

        return view('channel', compact('channel', 'discusions'));
    }

    public function discusion($slug){
    	$discusion = Discusion::with(['replies', 'user', 'replies.user'])->where('slug', $slug)->first();

        return view('discusion', compact('discusion'));
    }

    public function reply(Request $request, $id){

    	$request->validate([
    		'body' => 'required'
    	]);

    	Reply::create([
    		'user_id' => Auth::user()->id,
    		'discusion_id' => $id,
    		'body' => $request->body
    	]);

    	return redirect()->back();
    }
}
