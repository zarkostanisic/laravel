<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mail;
use App\Mail\ConfirmYourEmail;

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

    use RefreshDatabase;
    /**
     * @group user-register-email-sent
     *
     * @return void
     */
    public function testUserRegisterEmailSent()
    {
    	$this->withoutExceptionHandling();

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


}
