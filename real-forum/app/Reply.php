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
        return $this->belongsToMany('App\Reply', 'likes');
    }

    public function is_liked_by_auth_user(){
    	$likers = $this->likes->pluck('user_id')->all();

    	return in_array(Auth::user()->id, $likers);
    }
}
