<?php

namespace App\Entities;
use Redis;
use App\Lesson;
use App\Series;

trait Learning{
	public function completeLesson($lesson){
        Redis::sadd('user:' . $this->id . 'series:' . $lesson->series_id, [$lesson->id]);
    }

    public function percentageCompletedForSeries($series){
        $numberOfLessons = $series->lessons()->count();
        $numberOfCompletedLessons = $this->getNumberOfCompletedLessonsForSeries($series);

        return number_format(($numberOfCompletedLessons / $numberOfLessons) * 100, 0);
    }

    public function getCompletedLessonsForSeries($series){
        $completedLessons = Redis::smembers('user:' . $this->id . 'series:' . $series->id);

        return collect($completedLessons)->map(function($lesson){
            return Lesson::find($lesson);
        });
    }

    public function getNumberOfCompletedLessonsForSeries($series){
        return Redis::scard('user:' . $this->id . 'series:' . $series->id);
    }

    public function hasStartedSeries($series){
        return $this->getNumberOfCompletedLessonsForSeries($series) > 0;
    }

    public function hasCompletedLesson($lesson) {
        $completed_lessons = Redis::smembers('user:' . $this->id . 'series:' . $lesson->series->id);;

        return in_array(
            $lesson->id,
            $completed_lessons
        );
    }

    public function seriesBeingWatchedIds(){
        $keys = Redis::keys('user:' . $this->id . 'series:*');
        $series_ids = [];


        foreach($keys as $key){
            $series_id = explode('user:' . $this->id . 'series:', $key);
            array_push($series_ids, $series_id[1]);
        }

        return $series_ids;
    }

    public function seriesBeingWatched(){

        return collect($this->seriesBeingWatchedIds())->map(function($id){
            return Series::find($id);
        })->filter();
    }

    public function getTotalNumberOfCompletedLessons(){
        $keys = Redis::keys('user:' . $this->id . 'series:*');

        $result = 0;

        foreach($keys as $key){
           $result += Redis::scard($key);
        }

        return $result;
    }
}