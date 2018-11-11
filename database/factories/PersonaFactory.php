<?php

use Faker\Generator as Faker;

$factory->define(App\Persona::class, function (Faker $faker) {
    return [
        'nombre' =>$faker->name,
        'rut' =>$faker->postcode,
        'genero' =>$faker->randomElement(['hombre', 'mujer']),
        'fecha_nacimiento' =>$faker->dateTime($max = 'now', $timezone = null),

    ];
});
