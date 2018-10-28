<?php

use Faker\Generator as Faker;

$factory->define(App\Universidad::class, function (Faker $faker) {
    return [
        'nombre' =>$faker->catchPhrase,
        'sede' =>$faker->randomElement(['Antofagasta','Coquimbo']),
    ];
});
