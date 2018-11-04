<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

         $this->call([NivelCargosTableSeeder::class,
             AreasTableSeeder::class,
         ]);
        factory(App\Tipo_empresa::class, 20)->create();
        factory(App\Universidad::class, 20)->create();
        factory(App\Carrera::class, 10)->create();

        factory(App\Persona::class, 50)->create()->each(function ($u) {
            $cant = rand(0,3);
            for($i=0;$i<$cant;++$i){
                $u->postgrados()->save(factory(App\Postgrado::class)->make());
            }
            $cant = rand(0,3);
            for($i=0;$i<$cant;++$i){
                $empr = factory(App\Empresa::class)->make();
                $u->empresas()->save($empr);
                $cant = rand(0,3);
                for($i=0;$i<$cant;++$i) {
                    $nivel = \App\Nivel_cargo::inRandomOrder()->first();
                    $area = \App\Area::inRandomOrder()->first();
                    $cargo = factory(App\Cargo::class)->make();
                    $nivel->cargos()->save($cargo);
                    $area->cargos()->save($cargo);
                    $empr->cargos()->save($cargo);
                    \App\Tipo_empresa::inRandomOrder()->first()->empresas()->save($empr);
                }
            }
            $cant = rand(0,3);
            for($i=0;$i<$cant;++$i){
                $u->carreras()->attach(\App\Carrera::inRandomOrder()->first());
            }


        });
    }
}
