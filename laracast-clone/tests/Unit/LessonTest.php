<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Series;
use App\Lesson;

class LessonTest extends TestCase
{
	use RefreshDatabase;
    /**
     * @group lesson-next-prev
     *
     * @return void
     */
    public function testLessonNextPrev()
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

        $this->assertEquals($lesson->nextLesson()->id, $lesson3->id);
        $this->assertEquals($lesson->prevLesson()->id, $lesson2->id);

        $this->assertEquals($lesson2->nextLesson()->id, $lesson->id);
        $this->assertEquals($lesson2->prevLesson()->id, $lesson2->id);

        $this->assertEquals($lesson3->nextLesson()->id, $lesson3->id);
        $this->assertEquals($lesson3->prevLesson()->id, $lesson->id);
    }
}
