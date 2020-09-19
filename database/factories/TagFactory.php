<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Tag::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
    ];
});
