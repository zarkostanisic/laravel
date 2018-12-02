<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Series;
use App\Lesson;

class SeriesTest extends TestCase
{
	use RefreshDatabase;
    /**
     * @group series-can-get-image-path
     *
     * @return void
     */
    public function testSeriesCanGetImagePath()
    {
    	$image = 'series/series-slug.png';
        $series = factory('App\Series')->create([
        	'image' => $image
        ]);

        $this->assertEquals('storage/' . $image,  $series->image);
    }

    use RefreshDatabase;
    /**
     * @group series-can-get-ordered-lessons
     *
     * @return void
     */
    public function testSeriesCanGetOrderedLessons()
    {
        $series = factory('App\Series')->create();

        $lesson = factory('App\Lesson')->create([
            'series_id' => $series->id,
            'episode_number' => 200
        ]);

        $lesson2 = factory('App\Lesson')->create([
            'series_id' => $series->id,
            'episode_number' => 100
        ]);

        $lesson3 = factory('App\Lesson')->create([
            'series_id' => $series->id,
            'episode_number' => 300
        ]);

        $lessons = $lesson->series->getOrderedLessons();
        $this->assertInstanceOf(Lesson::class, $lessons->random());
        $this->assertEquals($lessons->first()->id, $lesson2->id);
        $this->assertEquals($lessons->last()->id, $lesson3->id);
    }


}
