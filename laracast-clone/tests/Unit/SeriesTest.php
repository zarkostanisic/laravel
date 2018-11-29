<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SeriesTest extends TestCase
{
	use RefreshDatabase;
    /**
     * @group series-can-get-image-Path
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
}
