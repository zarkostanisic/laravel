<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

use Illuminate\Database\Eloquent\Model;

class Post extends Model// implements SluggableInterface
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = [
    	'category_id', 'image_id', 'title', 'body'
    ];

     public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function image(){
    	return $this->belongsTo('App\Image');
    }

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function imagePlaceholder(){
        return 'http://placehold.it/700X200';
    }
}
