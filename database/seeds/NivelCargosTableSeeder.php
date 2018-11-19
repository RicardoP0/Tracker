<?php

use Illuminate\Database\Seeder;

class NivelCargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nivel_cargos')->insert([
            'nombre' => 'Gerencia',
            'nivel' =>2
        ]);
        DB::table('nivel_cargos')->insert([
            'nombre' => 'Jefe',
            'nivel' =>3
        ]);
        DB::table('nivel_cargos')->insert([
            'nombre' => 'Soporte',
            'nivel' =>1
        ]);
    }
}
