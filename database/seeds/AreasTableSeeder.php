<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            'nombre' => 'Desarrollo',
        ]);
        DB::table('areas')->insert([
            'nombre' => 'Seguridad',
        ]);
        DB::table('areas')->insert([
            'nombre' => 'Soporte',
        ]);
        DB::table('areas')->insert([
            'nombre' => 'Robotica',
        ]);
        DB::table('areas')->insert([
            'nombre' => 'Otro',
        ]);
    }
}
