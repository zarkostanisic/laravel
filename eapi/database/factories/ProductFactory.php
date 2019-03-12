<?php

use Faker\Generator as Faker;
use App\Model\Product;
use App\User;

$factory->define(App\Model\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'detail' => $faker->paragraph,
        'price' => $faker->numberBetween(100, 2000),
        'stock' => $faker->randomDigit,
        'discount' => $faker->numberBetween(10, 30),
        'user_id' => function(){
    		return User::all()->random();
    	}
    ];
});
