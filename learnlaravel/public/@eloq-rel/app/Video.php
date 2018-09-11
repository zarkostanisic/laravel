<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /*
	|--------------------------------------------------------------------------
	| ELOQUENT POLYMORPHIC relations - many to many
	|--------------------------------------------------------------------------
	*/
    public function tags(){
    	return $this->morphToMany('App\Tag', 'taggable');
    }
}
