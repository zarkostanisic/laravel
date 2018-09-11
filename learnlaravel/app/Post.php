<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use SoftDeletes;
    // protected $table = "posts";
    // protected $primaryKey = "post_id";

    protected $dates = ['delated_at'];

    protected $fillable = ['title', 'body', 'path'];

    public $directory = '/images/';

    public function user(){
    	return $this->belongsTo('App\User');
    }

    //polymorphic
    public function photos(){
    	return $this->morphMany('App\Photo', 'imagable');
    }

    //polymorphic many to many
    public function tags(){

    	return $this->morphToMany('App\Tag', 'taggable');
    }

    //accessors
    public function getTitleAttribute($value){
        //return ucfirst($value);
        return strtoupper($value);
    }

    public function getPathAttribute($value){
        return $this->directory . $value;
    }

    //mutators
    public function setTitleAttribute($value){
        $this->attributes['title'] = strtoupper($value);
    }

    //scope
    public static function scopeLatest($query){
        return $query->orderBy('id', 'desc')->get();
    }
}
