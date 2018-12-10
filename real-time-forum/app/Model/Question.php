<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Question extends Model
{
	protected $fillable = [
		'title', 'slug', 'body', 'category_id', 'user_id'
	];

	protected $with = [
		/*'category',*/ 'user'
	];

	public function getRouteKeyName(){
    	return 'slug';
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function getPathAttribute()
    {
        return route('question.show', $this->slug);
    }

	public function user(){
    	return $this->belongsTo(User::class);
    }

    public function replies(){
    	return $this->hasMany(Reply::class);
    }

    public function category(){
    	return $this->belongsTo(Category::class);
    }
}
