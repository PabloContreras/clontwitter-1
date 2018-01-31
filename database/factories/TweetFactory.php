<?php

use Faker\Generator as Faker;

$factory->define(App\Tweet::class, function (Faker $faker) {
    return [
        'user_id' => App\User::all()->random()->id,
        'body' => $faker->realText($maxNbChars = 140),
    ];
});
