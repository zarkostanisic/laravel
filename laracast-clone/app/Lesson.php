<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
    	'series_id', 'title', 'description', 'episode_number', 'video_id'
    ];

    public function series(){
    	return $this->belongsTo('App\Series');
    }

    public function nextLesson(){
    	return $this->series->lessons()->where('episode_number', '>', $this->episode_number)->orderBy('episode_number', 'asc')->first();
    }

    public function prevLesson(){
    	return $this->series->lessons()->where('episode_number', '<', $this->episode_number)->orderBy('episode_number', 'desc')->first();
    }
}
