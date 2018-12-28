<?php

namespace App\Http\Controllers;

use App\Model\Like;
use Illuminate\Http\Request;
use App\Model\Reply;

class LikeController extends Controller
{
	public function __construct(){
        $this->middleware('jwt');
    }

    public function like(Reply $reply){
        $reply->likes()->create(['user_id' => auth()->id()]);
    }

    public function unlike(Reply $reply){
        $reply->likes()->where('user_id', auth()->id())->first()->delete();
    }
}
