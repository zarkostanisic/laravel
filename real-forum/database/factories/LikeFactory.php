<?php

use Faker\Generator as Faker;
use App\Reply;
use App\User;

$factory->define(App\Like::class, function (Faker $faker) {
    return [
        'reply_id' => Reply::pluck('id')->random(),
        'user_id' => User::pluck('id')->random()
    ];
});
