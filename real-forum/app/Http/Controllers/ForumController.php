<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use App\Discusion;
use App\Reply;
use Auth;
use Notification;

class ForumController extends Controller
{
    public function channel($slug){
    	$channel = Channel::with(['discusions', 'discusions.user'])->where('slug', $slug)->first();
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

        $discusion = Discusion::find($id);
        $watchers = $discusion->watchers;
        
        Notification::send($watchers, new \App\Notifications\NewReplyAdded($discusion));

    	return redirect()->back();
    }

    public function like($id){
        $reply = Reply::find($id);
        $reply->likes()->attach(Auth::user()->id);

        // Auth::user()->likes()->attach($id);
        return redirect()->back();
    }

    public function unlike($id){
        $reply = Reply::find($id);
        $reply->likes()->detach(Auth::user()->id);

        // Auth::user()->likes()->detach($id);

        return redirect()->back();
    }

    public function watch($id){
        $discusion = Discusion::find($id);

        $discusion->watchers()->attach(Auth::user()->id);

        return redirect()->back();
    }

    public function unwatch($id){
        $discusion = Discusion::find($id);

        $discusion->watchers()->detach(Auth::user()->id);

        return redirect()->back();
    }
}
