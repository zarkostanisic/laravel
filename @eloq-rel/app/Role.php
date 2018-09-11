<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	/*
    |--------------------------------------------------------------------------
    | ELOQUENT relations - many to many - inverse
    |--------------------------------------------------------------------------
    */
    public function users(){
    	return $this->belongsToMany('App\User');
    }
}
