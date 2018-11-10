<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'title', 'slug', 'body', 'category_id', 'featured'
	];

	protected $dates = [
		'deleted_at'
	];

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function setTitleAttribute($value){
    	$this->attributes['title'] = $value;
    	$this->attributes['slug'] = str_slug($value);
    }

    public function getFeaturedAttribute($value){
    	return asset('/uploads/posts/' . $value);
    }
}
