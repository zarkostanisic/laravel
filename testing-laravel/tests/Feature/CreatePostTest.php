<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;

class CreatePostTest extends TestCase
{
	use RefreshDatabase;
    /**
    * @group create-post
     * A basic test example.
     *
     * @return void
     */
    public function testCanCreatePost()
    {
        $response = $this->post('/posts/store', [
        	'title' => 'test title',
        	'body' => 'test body'
        ]);

        $this->assertDatabaseHas('posts', [
        	'title' => 'test title',
        	'body' => 'test body'
        ]);

        $post = Post::find(1);

        $this->assertEquals('test title', $post->title);
        $this->assertEquals('test body', $post->body);
    }

    /**
    * @group title-required
     * A basic test example.
     *
     * @return void
     */
    public function testTitleIsRequired(){
    	$response = $this->post('/posts/store', [
        	'title' => null,
        	'body' => 'test body'
        ]);

        $response->assertSessionHasErrors('title');
    }

     /**
    * @group body-required
     * A basic test example.
     *
     * @return void
     */
    public function testBodyIsRequired(){
    	$response = $this->post('/posts/store', [
        	'title' => 'test title',
        	'body' => null
        ]);

        $response->assertSessionHasErrors('body');
    }
}
