<?php

use Faker\Generator as Faker;

$factory->define(App\Persona::class, function (Faker $faker) {
    return [
        'nombre' =>$faker->name,
        'rut' =>$faker->postcode,
        'genero' =>$faker->randomElement(['hombre', 'mujer']),
        'fecha_nacimiento' =>$faker->dateTime($max = 'now', $timezone = null),
        'fecha_ingreso' =>$faker->dateTime($max = 'now', $timezone = null),
        'fecha_egreso' =>$faker->dateTime($max = 'now', $timezone = null),
        'fecha_titulacion' =>$faker->dateTime($max = 'now', $timezone = null),
    ];
});
