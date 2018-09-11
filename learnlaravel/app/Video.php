<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //polymorphic many to many
    public function tags(){

    	return $this->morphToMany('App\Tag', 'taggable');
    }
}
