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

       	$this->assertEquals($user->getNumberOfCompletedLessonsForSeries($series), 2);
    }

    /**
     * @group user-get-percentage-completed-for-series
     *
     * @return void
     */
    public function testUserGetPercentageCompletedForSeries()
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

       	factory('App\Lesson')->create([
       		'series_id' => $series->id
       	]);

       	factory('App\Lesson')->create([
       		'series_id' => $series->id
       	]);

       	$user->completeLesson($lesson);
       	$user->completeLesson($lesson2);

       	$this->assertEquals($user->percentageCompletedForSeries($lesson->series), 50);
    }

    /**
     * @group user-has-started-series
     *
     * @return void
     */
    public function testHasStartedSeries()
    {
      $this->flushRedis();

      $user = factory('App\User')->create();
      $series = factory('App\Series')->create();

      $lesson = factory('App\Lesson')->create();

      $lesson2 = factory('App\Lesson')->create([
        'series_id' => $series->id
      ]);

      $lesson3 = factory('App\Lesson')->create();

      $user->completeLesson($lesson2);

      $this->assertTrue($user->hasStartedSeries($lesson2->series));
      $this->assertFalse($user->hasStartedSeries($lesson3->series));
    }


}
