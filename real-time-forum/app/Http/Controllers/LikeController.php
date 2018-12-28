<?php

namespace App\Http\Controllers;

use App\Model\Like;
use Illuminate\Http\Request;
use App\Model\Reply;
use App\Events\LikeEvent;

class LikeController extends Controller
{
	public function __construct(){
        $this->middleware('jwt');
    }

    public function like(Reply $reply){
        $reply->likes()->create(['user_id' => auth()->id()]);

        broadcast(new LikeEvent($reply->id, 1))->toOthers();
    }

    public function unlike(Reply $reply){
        $reply->likes()->where('user_id', auth()->id())->first()->delete();

        broadcast(new LikeEvent($reply->id, 0))->toOthers();
    }
}
