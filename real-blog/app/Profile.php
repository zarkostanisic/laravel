<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
    	'avatar', 'about', 'facebook', 'youtube', 'user_id'
    ];

    // ONE TO ONE
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function getAvatarAttribute($value){
    	return asset('/uploads/avatars/' . $value);
    }
}
