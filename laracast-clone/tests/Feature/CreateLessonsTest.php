<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateLessonsTest extends TestCase
{
	use RefreshDatabase;
    /**
     * @group create-lesson
     *
     * @return void
     */
    public function testCreateLesson()
    {
    	$this->withoutExceptionHandling();

    	$this->loginAdmin();

        $series = factory('App\Series')->create();

        $lesson = [
        	'title' => 'test title',
        	'description' => 'test description',
        	'episode_number' => 23,
        	'video_id' => 12,
        ];

        $this->postJson('/admin/' . $series->id . '/lessons', $lesson)
        	->assertStatus(201)
        	->assertJson($lesson);  

        $this->assertDatabaseHas('lessons', [
        	'title' => $lesson['title']
        ]); 
    }

    /**
     * @group create-lesson-without-title
     *
     * @return void
     */
    public function testCreateLessonWithoutTitle()
    {
    	// $this->withoutExceptionHandling();

    	$this->loginAdmin();

        $series = factory('App\Series')->create();

        $lesson = [
        	'description' => 'test description',
        	'episode_number' => 23,
        	'video_id' => 12,
        ];

        $this->post('/admin/' . $series->id . '/lessons', $lesson)
        	->assertSessionHasErrors('title');

    }

    /**
     * @group create-lesson-without-description
     *
     * @return void
     */
    public function testCreateLessonWithoutDescription()
    {
    	// $this->withoutExceptionHandling();

    	$this->loginAdmin();

        $series = factory('App\Series')->create();

        $lesson = [
        	'title' => 'test title',
        	'episode_number' => 23,
        	'video_id' => 12,
        ];

        $this->post('/admin/' . $series->id . '/lessons', $lesson)
        	->assertSessionHasErrors('description');

    }

    /**
     * @group create-lesson-without-episode-number
     *
     * @return void
     */
    public function testCreateLessonWithoutEpisodeNumber()
    {
    	// $this->withoutExceptionHandling();

    	$this->loginAdmin();

        $series = factory('App\Series')->create();

        $lesson = [
        	'description' => 'test description',
        	'title' => 'test title',
        	'video_id' => 12,
        ];

        $this->post('/admin/' . $series->id . '/lessons', $lesson)
        	->assertSessionHasErrors('episode_number');

    }

    /**
     * @group create-lesson-without-video-id
     *
     * @return void
     */
    public function testCreateLessonWithoutVideoId()
    {
    	// $this->withoutExceptionHandling();

    	$this->loginAdmin();

        $series = factory('App\Series')->create();

        $lesson = [
        	'description' => 'test description',
        	'title' => 'test title',
        	'description' => 'test description',
        ];

        $this->post('/admin/' . $series->id . '/lessons', $lesson)
        	->assertSessionHasErrors('video_id');

    }
}
