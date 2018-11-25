<?php

use Faker\Generator as Faker;

$factory->define(App\Postgrado::class, function (Faker $faker) {
    return [
        'nombre' =>$faker->catchPhrase,
        'fecha_obtencion' =>$faker->dateTime($max = 'now', $timezone = null),
        'universidad_id' => \App\Universidad::all()->random()->id,
        'TipoPostgrado_id' =>\App\TipoPostgrado::all()->random()->id,
    ];
});
