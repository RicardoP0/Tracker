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
            'nombre' => 'magister',
        ]);
        DB::table('tipo_postgrados')->insert([
            'nombre' => 'doctorado',
        ]);
        DB::table('tipo_postgrados')->insert([
            'nombre' => 'diplomado',
        ]);
        DB::table('tipo_postgrados')->insert([
            'nombre' => 'licenciado',
        ]);
    }
}
