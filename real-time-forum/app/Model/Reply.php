<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Reply extends Model
{
    protected static function boot(){
        parent::boot();

        static::creating(function($reply){
            $reply->user_id = auth()->id();
        });
    }

	protected $fillable = [
		'body', 'question_id', 'user_id'
	];

    protected $with = [
        'user'
    ];

    public function getReplyAttribute()
    {
        return $this->body;
    }

    public function question(){
    	return $this->belongsTo(Question::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function likes(){
    	return $this->hasMany(Like::class);
    }
}
