<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;

class PostTest extends TestCase
{
    /**
    * @group formatted-date
     * A basic test example.
     *
     * @return void
     */
    public function testCanGetCreatedAtFormattedDate()
    {
        $post = Post::create([
        	'title' => 'A simple title',
        	'body' => 'A simple body'
        ]);

        $formattedDate = $post->createdAt();
        $this->assertEquals($post->created_at->toFormattedDateString(), $formattedDate);
    }
}
