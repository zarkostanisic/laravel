<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Storage;

class CreateSeriesTest extends TestCase
{

	use RefreshDatabase;
    /**
     * @group create-series
     *
     * @return void
     */
    public function testCreateSeries()
    {
       // $this->withoutExceptionHandling();
       Storage::fake(config('filesystem.default'));

       $title = 'title';

       $this->post('/admin/series', [
       		'title' => $title,
       		'slug' => str_slug($title),
       		'image' => UploadedFile::fake()->image('image-series.png'),
       		'description' => 'test description'
       ])->assertRedirect()
       ->assertSessionHas('success', 'series created');

       $this->assertDatabaseHas('series', [
       		'title' => $title
       ]);

       Storage::disk(config('filesystem.default'))->assertExists(
       		'series/' . str_slug($title) . '.png'
       	);
    }

    /**
     * @group create-series-without-title
     *
     * @return void
     */
    public function testCreateSeriesWithoutTitle()
    {

       $title = 'title';

       $this->post('/admin/series', [
       		'slug' => str_slug($title),
       		'description' => 'test description'
       ])->assertSessionHasErrors('title');
    }

    /**
     * @group create-series-without-description
     *
     * @return void
     */
    public function testCreateSeriesWithoutDescription()
    {

       $title = 'title';

       $this->post('/admin/series', [
       		'title' => $title,
       		'slug' => str_slug($title),
       ])->assertSessionHasErrors('description');
    }

    /**
     * @group create-series-without-image
     *
     * @return void
     */
    public function testCreateSeriesWithoutImage()
    {

       $title = 'title';

       $this->post('/admin/series', [
       		'title' => $title,
       		'description' => 'test description',
       		'image' => 'STRING_2INVALID_IMAGE'
       		
       ])->assertSessionHasErrors('image');
    }

    /**
     * @group create-series-only-admin
     *
     * @return void
     */
    public function testCreateSeriesOnlyAdmin()
    {

       $user = factory('App\User')->create();
       $this->actingAs($user);

       $title = 'test';
       $this->post('/admin/series')->assertSessionHas('error', 'not authorized');
    }
}
