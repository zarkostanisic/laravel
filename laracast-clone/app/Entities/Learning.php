<?php

namespace App\Entities;
use Redis;
use App\Lesson;

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
}