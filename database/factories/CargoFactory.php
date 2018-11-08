<?php

use Faker\Generator as Faker;

$factory->define(App\Cargo::class, function (Faker $faker) {
    $init_date = $faker->dateTimeBetween($startDate = '-15 years', $endDate = 'now', $timezone = null);
    $end_date=$faker->dateTimeBetween($init_date, strtotime('+2 years'));
    return [
        'fecha_inicio' =>$init_date,
        'fecha_termino' =>$end_date,
        'sueldo'=>$faker->randomNumber(5),
        'nivel_cargo_id' => \App\Nivel_cargo::all()->random()->id,
        'empresa_id' => \App\Empresa::all()->random()->id,
        'area_id' => \App\Area::all()->random()->id,
    ];
});
