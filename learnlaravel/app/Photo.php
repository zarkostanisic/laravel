<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //polymorphic
    public function imagable(){
    	return $this->morphTo();
    }
}
