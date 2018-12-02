<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $fillable = [
    	'title', 'slug', 'image', 'description'
    ];

    protected $with = [
    	'lessons'
   	];

    public function getRouteKeyName(){
    	return 'slug';
    }

    public function lessons(){
    	return $this->hasMany('App\Lesson');
    }

    public function getImageAttribute($value){
        return 'storage/' . $value;
    }

    public function getOrderedLessons(){
        return $this->lessons()->orderBy('episode_number', 'asc')->get();
    }
}
