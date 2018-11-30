<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Redis;

class UserTest extends TestCase
{
	use RefreshDatabase;
    /**
     * @group user-complete-lesson
     *
     * @return void
     */
    public function testUserCompleteLesson()
    {
    	$this->flushRedis();

        $user = factory('App\User')->create();
        $series = factory('App\Series')->create();

       	$lesson = factory('App\Lesson')->create([
       		'series_id' => $series->id
       	]);

       	$lesson2 = factory('App\Lesson')->create([
       		'series_id' => $series->id
       	]);

       	$user->completeLesson($lesson);
       	$user->completeLesson($lesson2);

       	$this->assertEquals(Redis::smembers('user:' . $user->id . 'series:' . $series->id), [$lesson->id, $lesson2->id]);
    }
}
