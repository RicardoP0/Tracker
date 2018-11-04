<?php

use Faker\Generator as Faker;

$factory->define(App\Cargo::class, function (Faker $faker) {
    return [
        'fecha_inicio' =>$faker->dateTime($max = 'now', $timezone = null),
        'fecha_termino' =>$faker->dateTime($max = 'now', $timezone = null),
        'sueldo'=>$faker->randomNumber(7),
        'nivel_cargo_id' => \App\Nivel_cargo::all()->random()->id,
        'empresa_id' => \App\Empresa::all()->random()->id,
        'area_id' => \App\Area::all()->random()->id,
    ];
});
