<?php

use Faker\Generator as Faker;

$factory->define(App\Channel::class, function (Faker $faker) {
	$title = ucfirst($faker->unique()->word());
    return [
        'title' => $title,
        'slug' => str_slug($title)
    ];
});
