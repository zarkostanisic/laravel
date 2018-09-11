<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	 /*
    |--------------------------------------------------------------------------
    | ELOQUENT relations - has many through
    |--------------------------------------------------------------------------
    */
    public function posts(){
    	return $this->hasManyThrough('App\Post', 'App\User');
    }
}
