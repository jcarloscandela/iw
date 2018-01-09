<?php

use Faker\Generator as Faker;

$factory->define(App\Track::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->text(10),
        'bpm' => 128,
        'key' => "A",
        'duration' =>  $faker->dateTime,
        'price' => 1.24,
        'genre' => "prueba",
        'release' => $faker->date,
    ];
});
