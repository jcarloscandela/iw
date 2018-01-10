<?php

use Faker\Generator as Faker;

$factory->define(App\Artist::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'picture' => str_random(15),//str_random(10).'@gmail.com',
        'biography' => str_random(200),
    ];
});
