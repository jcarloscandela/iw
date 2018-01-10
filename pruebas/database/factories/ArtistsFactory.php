<?php

use Faker\Generator as Faker;

$factory->define(App\Artist::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'picture' => str_random(15),
        'biography' => $faker->realText(500)
    ];
});
