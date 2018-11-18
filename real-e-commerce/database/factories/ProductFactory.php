<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => str_replace('.', '', $faker->sentence(2)),
        'price' => $faker->numberBetween(100, 1000000),
        'image' => 'book.jpg'
    ];
});
