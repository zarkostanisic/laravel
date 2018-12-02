<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WatchSeriesTest extends TestCase
{
	use RefreshDatabase;

    /**
     * @group complete-series
     *
     * @return void
     */
    public function testCompleteSeries()
    {
    	$this->flushRedis();

        $user = factory('App\User')->create();

        $this->actingAs($user);

        $series = factory('App\Series')->create();

        $lesson = factory('App\Lesson')->create([
        	'series_id' => $series->id
        ]);

        $lesson2 = factory('App\Lesson')->create([
        	'series_id' => $series->id
        ]);


        $response = $this->post('/series/complete-lesson/' . $lesson->id, []);
        $response->assertStatus(200);
        $response->assertJson([
        	'status' => 'ok'
        ]);

        $this->assertTrue($user->hasCompletedLesson($lesson));

        $this->assertFalse($user->hasCompletedLesson($lesson2));
    }
}
