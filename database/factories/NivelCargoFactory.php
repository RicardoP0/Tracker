<?php

use Faker\Generator as Faker;

$factory->define(App\Nivel_cargo::class, function (Faker $faker) {
    return [
        'nombre' =>$faker->catchPhrase,

    ];
});
