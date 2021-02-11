<?php

use Faker\Generator as Faker;

$factory->define(App\Artist::class, function (Faker $faker) {
  $num = rand(1,20);
  $imagen = "imgs/img".$num.".jpg";
    return [
        //
        'name' => $faker->name,
        'picture' => $imagen,
        'biography' => $faker->realText(500)
    ];
});
