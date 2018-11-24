<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreatePostTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
    * @group create-post
     * A Dusk test example.
     *
     * @return void
     */
    public function testAuthUserCanCreatePost()
    {
        $user = factory('App\User')->create();

        $this->browse(function(Browser $browser) use ($user){
            $browser->loginAs($user)
                ->visit('/posts/create')
                ->type('title', 'new post title ')
                ->type('body', 'new post body')
                ->press('Create')
                ->assertPathIs('/posts')
                ->assertSee('new post title')
                ->assertSee('new post body');
        });
    }

    /**
    * @group auth-user-create-post
     * A Dusk test example.
     *
     * @return void
     */
    public function testOnlyAuthUserCanCreatePost()
    {

        $this->browse(function(Browser $browser){
            $browser->visit('/posts/create')
                ->assertPathIs('/login');
        });
    }
}
