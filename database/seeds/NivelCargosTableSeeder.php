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
        ]);
        DB::table('nivel_cargos')->insert([
            'nombre' => 'Jefe',
        ]);
        DB::table('nivel_cargos')->insert([
            'nombre' => 'Soporte',
        ]);
    }
}
