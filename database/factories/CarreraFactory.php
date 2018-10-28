<?php

use Faker\Generator as Faker;

$factory->define(App\Carrera::class, function (Faker $faker) {
    return [
        'nombre' =>$faker->catchPhrase,
        'universidad_id' => \App\Universidad::all()->random()->id,
    ];
});
