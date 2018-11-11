<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'name', 'slug'
	];

	protected $dates = [
		'deleted_at'
	];

	// ONE TO MANY
    public function posts(){
    	return $this->hasMany('App\Post');
    }

    public function setNameAttribute($value){
    	$this->attributes['name'] = $value;
    	$this->attributes['slug'] = str_slug($value);
    }
}
