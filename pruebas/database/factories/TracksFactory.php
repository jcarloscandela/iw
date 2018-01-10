<?php

use Faker\Generator as Faker;
use App\Artist;

$factory->define(App\Track::class, function (Faker $faker) {
    $keys=['A','B','C','D','E'];
    $genres=["Techno","House","Electro","Dubstep","Trance"];
    $randnum = rand(0,4);
    $key=$keys[$randnum];
    $randnum2 = rand(0,4);
    $genre=$genres[$randnum2];
    $artists = Artist::All();
    $artist = $artists[rand(0,99)];
    return [
        //
        'title' => $faker->text(10),
        'bpm' => rand(100, 150),
        'key' => $key,
        'duration' => $faker->time($format = 'H:i:s'),
        'price' => (rand(100, 250)) / 100,
        'genre' => $genre,
        'release' => $faker->date,
        'artist_id' => $artist  ->id
    ];
});
