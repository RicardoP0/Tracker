<?php

use Illuminate\Database\Seeder;

class RubroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rubros')->insert([
            'nombre' => 'Agricultura, Ganadería, Silvicultura y Pesca',
        ]);
        DB::table('rubros')->insert([
            'nombre' => 'Explotación de Minas y Canteras ',
        ]);
        DB::table('rubros')->insert([
            'nombre' => 'Industrias Manufacturera',
        ]);
        DB::table('rubros')->insert([
            'nombre' => 'Suministro de Electricidad, Gas, Vapor y Aire Acondicionado',
        ]);
        DB::table('rubros')->insert([
            'nombre' => 'Suministro de Agua; Evacuación de Agua residuales, gestión de desechos y descontaminación',
        ]);
        DB::table('rubros')->insert([
            'nombre' => 'Construcción',
        ]);
        DB::table('rubros')->insert([
            'nombre' => 'Comercio al Por Mayor y al por Menor; Reparación de Vehículos Automotores y Motocicletas',
        ]);
        DB::table('rubros')->insert([
            'nombre' => 'Transporte y Almacenamiento',
        ]);
        DB::table('rubros')->insert([
            'nombre' => 'Actividades de Alojamiento y de Servicio de Comidas',
        ]);
        DB::table('rubros')->insert([
            'nombre' => 'Información y Comunicaciones',
        ]);
        DB::table('rubros')->insert([
            'nombre' => 'Actividades Financieras y de Seguros',
        ]);
        DB::table('rubros')->insert([
            'nombre' => 'Actividades inmobiliarias',
        ]);
        DB::table('rubros')->insert([
            'nombre' => 'Actividades Profesionales, Cientificas y Técnicas',
        ]);
        DB::table('rubros')->insert([
            'nombre' => 'Actividades de Servicios Administrativos y de Apoyo',
        ]);
        DB::table('rubros')->insert([
            'nombre' => 'Adm. Pública y Defensa; Planes de Seguridad Social de Afiliación Obligatoria',
        ]);
        DB::table('rubros')->insert([
            'nombre' => 'Enseñanza',
        ]);
        DB::table('rubros')->insert([
            'nombre' => 'Actividades de Atención de la Salud Humana y de Asistencia Social',
        ]);
        DB::table('rubros')->insert([
            'nombre' => 'Actividades Artísticas, de Entretenimiento y Recreativas',
        ]);
        DB::table('rubros')->insert([
            'nombre' => 'Otras Actividades de Servicios',
        ]);
        DB::table('rubros')->insert([
            'nombre' => 'Actividades de los Hogaes como Empleadores; Actividades No Diferenciadas de los Hogares',
        ]);
        DB::table('rubros')->insert([
            'nombre' => 'Actividades de Organizaciones y Órganos Extraterritoriales',
        ]);

    }
}
