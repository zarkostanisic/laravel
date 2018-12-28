<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\NotificationResource;

class NotificationController extends Controller
{
    public function notifications(){
    	return [
			'read' => NotificationResource::collection(auth()->user()->readNotifications),
			'unRead' => NotificationResource::collection(auth()->user()->unReadNotifications),
		];
    }

    public function markAsRead(Request $request){
    	auth()->user()->notifications->where('id', $request->id)->markAsRead();
    }
}
