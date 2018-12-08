<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Lesson;

class SubscriptionsTest extends TestCase
{
	use RefreshDatabase;
    /**
     * @group  user-without-plan-can-not-watch-free-lessons
     *
     * @return void
     */
    public function testUserWithoutPlanCanNotWatchFreeLessons()
    {
        $user = factory('App\User')->create();
        $this->actingAs($user);

        $lesson = factory('App\Lesson')->create([
        	'premium' => 1
        ]);

        //$this->fakeSubscribe($user);

        $this->get('/watch-series/' . $lesson->series->slug . '/' . $lesson->id)
        	->assertRedirect('/subscribe');
        
    }

    use RefreshDatabase;
    /**
     * @group  user-with-plan-can-watch-free-lessons
     *
     * @return void
     */
    public function testUserWithPlanCanWatchFreeLessons()
    {
        $user = factory('App\User')->create();
        $this->actingAs($user);

        $lesson = factory('App\Lesson')->create([
        	'premium' => 1
        ]);

        $lesson2 = factory('App\Lesson')->create([
        	'premium' => 0
        ]);

        $this->fakeSubscribe($user);

        $this->get('/watch-series/' . $lesson->series->slug . '/' . $lesson->id)
        	->assertViewIs('watch-series');

        $this->get('/watch-series/' . $lesson->series->slug . '/' . $lesson->id)
       		->assertViewIs('watch-series');
        
    }

    public function fakeSubscribe($user){
    	$user->subscriptions()->create([
    		'name' => 'yearly',
    		'stripe_id' => 'FAKE_STRIPE_ID',
    		'stripe_plan' => 'yearly',
    		'quantity' => 1
     	]);
    }
}
