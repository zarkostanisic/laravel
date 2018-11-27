<?php

use Faker\Generator as Faker;

$factory->define(App\Lesson::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'series_id' => function(){
        	return factory('App\Series')->create()->id;
        },
        'episode_number' => 100,
        'video_id' => 230485453,
        'description' => $faker->paragraph()
    ];
});
