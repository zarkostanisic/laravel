<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discusion extends Model
{
    protected $fillable = [
    	'user_id', 'channel_id', 'title', 'slug', 'body'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function channel(){
    	return $this->belongsTo('App\Channel');
    }

    public function replies(){
    	return $this->hasMany('App\Reply');
    }
}
