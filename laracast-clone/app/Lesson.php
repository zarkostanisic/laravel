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
    	$nextLesson = $this->series->lessons()->where('episode_number', '>', $this->episode_number)->orderBy('episode_number', 'asc')->first();

        if($nextLesson){
            return $nextLesson;
        }

        return $this;
    }

    public function prevLesson(){
    	$prevLesson = $this->series->lessons()->where('episode_number', '<', $this->episode_number)->orderBy('episode_number', 'desc')->first();

        if($prevLesson){
            return $prevLesson;
        }

        return $this;
    }
}
