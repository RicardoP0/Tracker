<?php

use Illuminate\Database\Seeder;

class CarrerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carreras')->insert([
            'nombre' => "ICCI",
            'universidad_id' => 1
        ]);

        DB::table('carreras')->insert([
            'nombre' => "IenCI",
            'universidad_id' => 1
        ]);

        DB::table('carreras')->insert([
            'nombre' => "IECI",
            'universidad_id' => 1
        ]);

    }
}
