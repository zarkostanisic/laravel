<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Reply extends Model
{
    protected $fillable = [
    	'user_id', 'discusion_id', 'body'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function discusion(){
        return $this->belongsTo('App\Discusion');
    }

    public function likes(){
        return $this->belongsToMany('App\User', 'likes');
    }

    public function is_liked_by_auth_user(){

    	return $this->likes()->where('user_id', auth()->id())->count() > 0;
    }
}
