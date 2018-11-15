<?php

use Faker\Generator as Faker;

use App\User;

$factory->define(App\Discusion::class, function (Faker $faker) {
	
	$title = rtrim($faker->sentence(rand(5, 10)), '.');

    return [
		'user_id' => User::pluck('id')->random(),
		'title' => $title,
		'slug' => str_slug($title),
		'body' => $faker->paragraphs(rand(3, 7), true)
    ];
});
