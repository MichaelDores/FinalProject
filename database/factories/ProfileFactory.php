<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'fname' => $faker->firstname,
        'lname' => $faker->lastname,
        'body' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    ];
});
