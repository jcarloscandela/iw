<?php

use Faker\Generator as Faker;
use App\Artist;
use App\Genre;
$factory->define(App\Track::class, function (Faker $faker) {
    $keys=['A','B','C','D','E'];
    $randnum = rand(0,4);
    $key=$keys[$randnum];
    $genres = Genre::All();
    $genreCount = count($genres) - 1;
    $genre = $genres[rand(0,$genreCount)];
    $artists = Artist::All();
    $artist = $artists[rand(0,99)];

    $num = rand(1,12);
    $url = "./mp3/track".$num.".mp3";
    //"./mp3/juicy.mp3"
    return [
        'title' => $faker->text(10),
        'bpm' => rand(100, 150),
        'key' => $key,
        'duration' => $faker->time($format = 'H:i:s'),
        'price' => (rand(100, 250)) / 100,
        'genre_id' => $genre->id,
        'release' => $faker->date,
        'url' => $url,
        'artist_id' => $artist->id
    ];
});

