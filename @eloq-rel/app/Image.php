<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	 /*
    |--------------------------------------------------------------------------
    | ELOQUENT POLYMORPHIC relations - one to many - inverse
    |--------------------------------------------------------------------------
    */
    public function imagable(){
    	return $this->morphTo();
    }
}
