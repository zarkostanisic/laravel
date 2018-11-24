<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
    * @group login
     * A Dusk test example.
     *
     * @return void
     */
    public function testAUserCanLogin()
    {
        $user = factory('App\User')->create();

        $this->browse(function(Browser $browser) use ($user){
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'secret')
                ->press('Login')
                ->assertPathIs('/home');
        });
    }

    /**
    * @group view-post
    */
    public function testAUserCanViewPost(){
        $post = factory('App\Post')->create();

        $this->browse(function(Browser $browser) use ($post){
            $browser->visit('/posts')
               ->clickLink('View Post Details')
               ->assertPathIs("/post/{$post->id}")
               ->assertSee($post->title)
               ->assertSee($post->body)
               ->assertSee($post->createdAt());
        });
    }
}
