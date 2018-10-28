<?php

use Faker\Generator as Faker;

$factory->define(App\Postgrado::class, function (Faker $faker) {
    return [
        'nombre' =>$faker->catchPhrase,
        'tipo' =>$faker->randomElement(['magister','doctorado','diplomado','licenciado']),
        'fecha_obtencion' =>$faker->dateTime($max = 'now', $timezone = null),
    ];
});
