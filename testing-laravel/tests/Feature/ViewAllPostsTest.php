<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewAllPostsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCanViewAllPosts()
    {
        $post = factory('App\Post')->create();
   		$response = $this->get("/posts");
   		$response->assertStatus(200);
   		$response->assertSee($post->title);
   		$response->assertSee(str_limit($post->body));
   		$response->assertSee($post->createdAt());

    }
}
