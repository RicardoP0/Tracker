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

        // $this->call(UsersTableSeeder::class);
        factory(App\Persona::class, 50)->create()->each(function ($u) {

            $u->postgrados()->save(factory(App\Postgrado::class)->make());
        });
    }
}
