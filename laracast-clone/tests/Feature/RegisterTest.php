<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mail;
use App\Mail\ConfirmYourEmail;
use App\User;

class RegisterTest extends TestCase
{
	use RefreshDatabase;
    /**
     * @group user-register
     *
     * @return void
     */
    public function testUserRegister()
    {

        $this->post('/register', [
        	'name' => 'Zarko Stanisic',
        	'email' => 'zarko.stanisic@live.com',
        	'password' => 'secret',
        	'password_confirmation' => 'secret'
        ])->assertRedirect();

        $this->assertDatabaseHas('users', ['email' => 'zarko.stanisic@live.com']);
    }

    /**
     * @group user-after-register-email-sent
     *
     * @return void
     */
    public function testUserAfterRegisterEmailSent()
    {
    	// $this->withoutExceptionHandling();

    	Mail::fake();

        $this->post('/register', [
        	'name' => 'Zarko Stanisic',
        	'email' => 'zarko.stanisic@live.com',
        	'password' => 'secret',
        	'password_confirmation' => 'secret'
        ])->assertRedirect();

        Mail::assertSent(ConfirmYourEmail::class);

        $this->assertDatabaseHas('users', ['email' => 'zarko.stanisic@live.com']);
    }

    /**
     * @group user-after-register-token
     *
     * @return void
     */
    public function testUserAfterRegisterToken()
    {
    	// $this->withoutExceptionHandling();

    	Mail::fake();

        $this->post('/register', [
        	'name' => 'Zarko Stanisic',
        	'email' => 'zarko.stanisic@live.com',
        	'password' => 'secret',
        	'password_confirmation' => 'secret'
        ])->assertRedirect();

        $user = User::find(1);

       $this->assertNotNull($user->confirm_token);
       $this->assertFalse($user->isConfirmed());
    }

    /**
     * @group user-after-register-confirm
     *
     * @return void
     */
    public function testUserAfterRegisterConfirm()
    {
        $user = factory('App\User')->create();

        $this->get("/register/confirm/?token={$user->confirm_token}")
        ->assertRedirect('/')
        ->assertSessionHas('success', 'success confirm');
        
        $this->assertTrue($user->fresh()->isConfirmed());
    }

    /**
     * @group user-after-register-confirm-wrong
     *
     * @return void
     */
    public function testUserAfterRegisterConfirmWrong()
    {
        $user = factory('App\User')->create();

        $this->get("/register/confirm/?token=WRONG_TOKEN")
        ->assertRedirect('/')
        ->assertSessionHas('error', 'error confirm');
    }

}
