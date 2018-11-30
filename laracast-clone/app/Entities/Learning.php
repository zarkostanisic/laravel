<?php

namespace App\Entities;
use Redis;

trait Learning{
	public function completeLesson($lesson){
        Redis::sadd('user:' . $this->id . 'series:' . $lesson->series_id, [$lesson->id]);
    }

    public function percentageCompletedForSeries($series){
        $numberOfLessons = $series->lessons()->count();
        $numberOfCompletedLessons = $this->getNumberOfCompletedLessonsForSeries($series);

        return number_format(($numberOfCompletedLessons / $numberOfLessons) * 100, 0);
    }

    public function getNumberOfCompletedLessonsForSeries($series){
        return Redis::scard('user:' . $this->id . 'series:' . $series->id);
    }
}