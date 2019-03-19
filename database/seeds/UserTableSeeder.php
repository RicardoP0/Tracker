<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Persona;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();


        $user = new User();
        $user->name = 'Admin';
        $user->rut = '123456789-0';
        $user->email = 'admin@example.com';
        $user->password = 'secret';
        $user->save();
        $user->roles()->attach($role_admin);

        $persona=new Persona();
        $persona->nombre='Admin';
        $persona->situacion_laboral='Activo';
        $persona->rut='123456789-0';
        $persona->genero='No definido';
        $persona->fecha_nacimiento='2019-03-14';
        $user->persona()->save($persona);

    }
}
