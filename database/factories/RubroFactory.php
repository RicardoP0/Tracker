<?php

use Faker\Generator as Faker;

$factory->define(App\Rubro::class, function (Faker $faker) {
    return [
        'nombre' =>$faker->company
    ];
});
