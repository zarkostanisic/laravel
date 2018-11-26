<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
	use RefreshDatabase;
    /**
     * @group user-login-wrong
     *
     * @return void
     */
    public function testUserLoginWrong()
    {

        $user = factory('App\User')->create();
        
        $this->postJson('/login', [
        	'email' => $user->email,
        	'password' => 'wrong-password'
        ])->assertRedirect()
        ->assertJson([
        	'message' => 'These credentials do not match our records'
        ]);
    }

    use RefreshDatabase;
    /**
     * @group user-login-correct
     *
     * @return void
     */
    public function testUserLoginCorrect()
    {

        $user = factory('App\User')->create();
        
        $this->postJson('/login', [
        	'email' => $user->email,
        	'password' => 'secret'
        ])->assertStatus(200)
        ->assertJson([
        	'status' => 'ok'
        ])
        ->assertSessionHas('success', 'login success');
    }
}
