<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use App\Discusion;

class ForumController extends Controller
{
    public function channel($id){
    	$channel = Channel::with(['discusions', 'discusions.user'])->where('id', $id)->first();
        $discusions = $channel->discusions()->latest()->paginate(2);

        return view('channel', compact('channel', 'discusions'));
    }

    public function discusion($slug){
    	$discusion = Discusion::where('slug', $slug)->first();

        return view('discusion', compact('discusion'));
    }
}
