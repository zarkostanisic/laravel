<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Series;
use Illuminate\Http\UploadedFile;
use Storage;

class UpdateSeriesTest extends TestCase
{
    /**
     * @group update-series
     *
     * @return void
     */
    public function testUpdateSeries()
    {
    	$this->loginAdmin();

    	Storage::fake(config('filesystem.default'));

    	$series = factory('App\Series')->create();

    	$title = 'title';

    	$this->put('/admin/series/' . $series->slug, [
       		'title' => $title,
       		'slug' => str_slug($title),
       		'image' => UploadedFile::fake()->image('image-series.png'),
       		'description' => 'test description',
       ])->assertRedirect()
       ->assertSessionHas('success', 'series updated');

       $image_new_name = 'series/' . str_slug($title) . '.png';

       Storage::disk(config('filesystem.default'))->assertExists(
       		$image_new_name
       	);

       $this->assertDatabaseHas('series', [
       		'slug' => str_slug($title),
       		'image' => $image_new_name
       ]);
    }

    /**
     * @group update-series-without-image
     *
     * @return void
     */
    public function testUpdateSeriesWithoutImage()
    {
    	$this->loginAdmin();

    	Storage::fake(config('filesystem.default'));

    	$series = factory('App\Series')->create();

    	$title = 'title';

    	$this->put('/admin/series/' . $series->slug, [
       		'title' => $title,
       		'slug' => str_slug($title),
       		'description' => 'test description'
       ])->assertRedirect()
    	->assertSessionHas('success', 'series updated');

    	$image_new_name = 'series/' . str_slug($title) . '.png';

       	Storage::disk(config('filesystem.default'))->assertMissing(
       		$image_new_name
       	);


    	$this->assertDatabaseHas('series', [
       		'slug' => str_slug($title),
       		'image' => $series->image
       	]);
    }
}
