<?php

use Faker\Generator as Faker;
use App\Model\Reply;
use App\User;

$factory->define(App\Model\Like::class, function (Faker $faker) {
    return [
        'reply_id' => function(){
        	return Reply::all()->random()->id;
        },
        'user_id' => function(){
        	return User::all()->random()->id;
        }
    ];
});
