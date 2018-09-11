<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	//has many through
    public function posts(){
    	return $this->hasManyThrough('App\Post', 'App\User');

    	//customize
   		return $this->hasManyThrough('App\Post', 'App\User', 'country_id', 'user_id');
    }
}
