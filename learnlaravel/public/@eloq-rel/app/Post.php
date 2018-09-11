<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	/*
    |--------------------------------------------------------------------------
    | ELOQUENT relations - one to one - inverse - get post user
    |--------------------------------------------------------------------------
    */
    public function user(){
    	return $this->belongsTo('App\User');
    }

    /*
    |--------------------------------------------------------------------------
    | ELOQUENT POLYMORPHIC relations - one to many - one table with data for many tables
    |--------------------------------------------------------------------------
    */
    public function images(){
    	return $this->morphMany('App\Image', 'imagable');
    }

    /*
    |--------------------------------------------------------------------------
    | ELOQUENT POLYMORPHIC relations - many to many
    |--------------------------------------------------------------------------
    */
    public function tags(){
    	return $this->morphToMany('App\Tag', 'taggable');
    }
}
