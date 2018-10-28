<?php

use Faker\Generator as Faker;

$factory->define(App\Tipo_empresa::class, function (Faker $faker) {
    return [
        'nombre' =>$faker->company
    ];
});
