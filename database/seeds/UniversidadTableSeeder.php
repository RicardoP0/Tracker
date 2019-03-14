<?php

use Illuminate\Database\Seeder;

class UniversidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('universidades')->insert([
            'nombre' => "Universidad catolica del norte",
            'sede' =>'Antofagasta'
        ]);

    }
}
