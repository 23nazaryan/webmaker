<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->sentence,
        'description' => $faker->sentence,
        'image' => 'photo4.jpg',
        'date' => $faker->dateTimeThisMonth()->format('d/m/y'),
        'views' => $faker->numberBetween(0, 5000),
        'category_id' => $faker->numberBetween(1, 5),
        'user_id' => 1,
        'status' => 1,
        'is_featured' => 1
    ];
});
