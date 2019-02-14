<?php

use Illuminate\Database\Seeder;

class TipoEmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_empresas')->insert([
            'nombre' => 'Persona Natural',
        ]);
        DB::table('tipo_empresas')->insert([
            'nombre' => 'Microempresa Familiar',
        ]);
        DB::table('tipo_empresas')->insert([
            'nombre' => 'Empresa Individual de Responsabilidad Limitada (E.I.R.L)',
        ]);
        DB::table('tipo_empresas')->insert([
            'nombre' => ' Sociedades de Responsabilidad Limitada',
        ]);
    }
}
