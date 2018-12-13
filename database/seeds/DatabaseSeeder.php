<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
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
             TipoPostgradosTableSeeder::class,
         ]);

        factory(App\User::class, 1)->create();
        factory(App\Tipo_empresa::class, 20)->create();
        factory(App\Universidad::class, 20)->create();
        factory(App\Carrera::class, 10)->create();
        factory(App\Rubro::class, 10)->create();


        factory(App\Persona::class, 50)->create()->each(function ($u) {
            $user = factory(App\User::class, 1)->create()->first();
            $u->user()->associate($user);
            $u->save();
            $faker = Faker::create();
            $cant = rand(0,3);
            for($i=0;$i<$cant;++$i){
                $u->postgrados()->save(factory(App\Postgrado::class)->make());
            }
            $cant = rand(1,3);
            for($i=0;$i<$cant;++$i){
                $empr = factory(App\Empresa::class)->make();
                $u->empresas()->save($empr);
                $cant = rand(1,3);
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
            $cant = rand(1,3);
            for($i=0;$i<$cant;++$i){
                $init_date = $faker->dateTimeBetween($startDate = '-15 years', $endDate = 'now', $timezone = null);
                $end_date=$faker->dateTimeBetween($init_date, strtotime('+3 years'));
                $title_date=$faker->dateTimeBetween($init_date, strtotime('+5 years'));
                $u->carreras()->attach([\App\Carrera::inRandomOrder()->first()->id
                    =>['fecha_ingreso' =>$init_date,
                        'fecha_egreso' =>$end_date,
                        'fecha_titulacion' =>$title_date,
                        'tipo_tesis' => $faker->randomElement(['proyecto','memoria','capstone','trabajo'])]
                ]);
            }


        });
    }
}
