<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Config;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function loginAdmin(){
    	$user = factory('App\User')->create();
       	$this->actingAs($user);

       Config::push('site.administrators', $user->email);
    }
}
