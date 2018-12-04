<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Redis;
use App\Lesson;

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

    /**
     * @group get-completed-lessons
     *
     * @return void
     */
    public function testGetCompleteLesson()
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

      $lesson3 = factory('App\Lesson')->create([
        'series_id' => $series->id
      ]);

      $user->completeLesson($lesson);
      $user->completeLesson($lesson2);

      $completedLessons = $user->getCompletedLessonsForSeries($lesson->series);
      $completedLessonsIds = $completedLessons->pluck('id')->all();

      $this->assertInstanceOf(\Illuminate\Support\Collection::class, $completedLessons);
      $this->assertInstanceOf(Lesson::class, $completedLessons->random());
      $this->assertTrue(in_array($lesson->id, $completedLessonsIds));
      $this->assertTrue(in_array($lesson2->id, $completedLessonsIds));
      $this->assertFalse(in_array($lesson3->id, $completedLessonsIds));
    }


    /**
     * @group complete-series-unit
     *
     * @return void
     */
    public function testCompleteSeries()
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

        $this->assertTrue($user->hasCompletedLesson($lesson));

        $this->assertFalse($user->hasCompletedLesson($lesson2));
    }


    /**
     * @group all-series-watched
     *
     * @return void
     */
    public function testAllSeriesWatched()
    {
         $this->flushRedis();

        $user = factory('App\User')->create();


        $series = factory('App\Series')->create();
        $series2 = factory('App\Series')->create();
        $series3 = factory('App\Series')->create();

        $lesson = factory('App\Lesson')->create([
          'series_id' => $series->id
        ]);

        $lesson2 = factory('App\Lesson')->create([
          'series_id' => $series->id
        ]);

        $lesson3 = factory('App\Lesson')->create([
          'series_id' => $series2->id
        ]);

        $lesson4 = factory('App\Lesson')->create([
          'series_id' => $series2->id
        ]);

        $lesson5 = factory('App\Lesson')->create([
          'series_id' => $series3->id
        ]);

        $lesson6 = factory('App\Lesson')->create([
          'series_id' => $series3->id
        ]);

        $user->completeLesson($lesson);
        $user->completeLesson($lesson3);

        $startedSeries = $user->seriesBeingWatched();

        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $startedSeries);
        $this->assertInstanceOf(\App\Series::class, $startedSeries->random());

        $idsOfStartedSeries = $startedSeries->pluck('id')->all();

        $this->assertTrue(in_array($lesson->series->id, $idsOfStartedSeries));

        $this->assertTrue(in_array($lesson3->series->id, $idsOfStartedSeries));

        $this->assertFalse(in_array($lesson6->series->id, $idsOfStartedSeries));

    }


}
