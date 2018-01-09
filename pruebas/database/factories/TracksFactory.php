<?php

use Faker\Generator as Faker;

$factory->define(App\Track::class, function (Faker $faker) {
    $keys=['A','B','C','D','E'];
    $genres=["Techno","House","Electro","Dubstep","Trance"];
    $randnum = rand(0,4);
    $key=$keys[$randnum];
    $randnum2 = rand(0,4);
    $genre=$genres[$randnum2];
    return [
        //
        'title' => $faker->text(10),
        'bpm' => rand(100, 150),
        'key' => $key,
        'duration' => $faker->time($format = 'H:i:s:'),
        'price' => (rand(100, 250)) / 100,
        'genre' => $genre,
        'release' => $faker->date,
    ];
});
