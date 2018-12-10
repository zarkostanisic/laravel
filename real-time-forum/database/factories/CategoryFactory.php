<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Category::class, function (Faker $faker) {
    $name = $faker->sentence;
    return [
        'name' => $name,
        'slug' => str_slug($name),
    ];
});
