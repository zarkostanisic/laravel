<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Question;

class Category extends Model
{
	protected $fillable = [
		'name', 'slug'
	];

	public function getRouteKeyName(){
    	return 'slug';
    }

    public function questions(){
    	return $this->belongsTo(Question::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
}
