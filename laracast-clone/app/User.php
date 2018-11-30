<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Redis;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'confirm_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isConfirmed(){
        return $this->confirm_token == null;
    }

    public function confirm(){
        $this->confirm_token = null;
        $this->save();
    }

    public function isAdmin(){
        return in_array($this->email, config('site.administrators'));
    }

    public function completeLesson($lesson){
        Redis::sadd('user:' . $this->id . 'series:' . $lesson->series_id, [$lesson->id]);
    }

    public function percentageCompletedForSeries($series){
        $numberOfLessons = $series->lessons()->count();
        $numberOfCompletedLessons = $this->getNumberOfCompletedLessonsForSeries($series);

        return number_format(($numberOfCompletedLessons / $numberOfLessons) * 100, 0);
    }

    public function getNumberOfCompletedLessonsForSeries($series){
        return count(Redis::smembers('user:' . $this->id . 'series:' . $series->id));
    }
}
