<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	/*
    |--------------------------------------------------------------------------
    | ELOQUENT POLYMORPHIC relations - many to many - inverse
    |--------------------------------------------------------------------------
    */
    public function posts(){
    	return $this->morphedByMany('App\Post', 'taggable');
    }

    public function videos(){
    	return $this->morphedByMany('App\Video', 'taggable');
    }
}
