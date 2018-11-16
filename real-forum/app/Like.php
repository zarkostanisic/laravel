<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
    	'reply_id', 'user_id'
    ];

    public function replies(){
    	return $this->belongsToMany('App\Reply', 'likes');
    }

    public function users(){
    	return $this->belongsToMany('App\User', 'likes');
    }
}
