<?php

use Illuminate\Database\Seeder;

class TipoPostgradosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_postgrados')->insert([
            'nombre' => 'Magíster',
        ]);
        DB::table('tipo_postgrados')->insert([
            'nombre' => 'Doctorado',
        ]);
        DB::table('tipo_postgrados')->insert([
            'nombre' => 'Diplomado',
        ]);
        DB::table('tipo_postgrados')->insert([
            'nombre' => 'Licenciado',
        ]);
    }
}
