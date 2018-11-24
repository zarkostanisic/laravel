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
}
