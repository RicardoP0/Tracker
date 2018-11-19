<?php

use Faker\Generator as Faker;

$factory->define(App\Empresa::class, function (Faker $faker) {
    return [
        'nombre' =>$faker->company,
        'persona_id'=> App\Persona::all()->random()->id,
        'tipo_empresa_id'=> App\Tipo_empresa::all()->random()->id,
        'rubro_id'=> App\Rubro::all()->random()->id,

    ];
});
