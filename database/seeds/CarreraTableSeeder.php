<?php

use Illuminate\Database\Seeder;

class CarreraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carreras')->insert([
            'nombre' => 'ICCI',
        ]);
        DB::table('carreras')->insert([
            'nombre' => 'IenCI',
        ]);
    }
}
