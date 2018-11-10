<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
		'title', 'body', 'category_id', 'featured'
	];

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function getFeaturedAttribute($value){
    	return '/uploads/posts/' . $value;
    }
}
