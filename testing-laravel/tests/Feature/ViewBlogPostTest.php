<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;

class ViewBlogPostTest extends TestCase
{
	use RefreshDatabase;
	
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCanViewABlogPost()
    {
        $post = Post::create([
        	'title' => 'A simple title',
        	'body' => 'A simple body'
        ]);

        $response = $this->get("/post/{$post->id}");
        $response->assertStatus(200);
        $response->assertSee($post->title);
        $response->assertSee($post->body);
        $response->assertSee($post->created_at);
    }
}
