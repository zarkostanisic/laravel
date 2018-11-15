<?php

use Faker\Generator as Faker;

use App\User;

$factory->define(App\Reply::class, function (Faker $faker) {
    return [
        'user_id' => User::pluck('id')->random(),
        'body' => $faker->paragraphs(rand(3, 7), true)
    ];
});
