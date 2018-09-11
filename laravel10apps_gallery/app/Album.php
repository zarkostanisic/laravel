<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
	protected $fillable = [
		'title', 'description', 'cover'
	];

    public function photos(){
    	return $this->hasMany('App\Photo');
    }

    public function getCoverAttribute($value){
    	return '/storage/covers/' . $value;
    }
}
