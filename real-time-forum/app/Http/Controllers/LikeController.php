<?php

namespace App\Http\Controllers;

use App\Model\Like;
use Illuminate\Http\Request;
use App\Model\Reply;

class LikeController extends Controller
{
    public function like(Reply $reply){
        $reply->likes()->create(['user_id' => /*auth()->id()*/1]);
    }

    public function unlike(Reply $reply){
        $reply->likes()->where('user_id', /*auth()->id()*/1)->first()->delete();
    }
}
