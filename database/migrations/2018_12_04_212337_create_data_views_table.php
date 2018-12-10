<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement($this->dropView());

        DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement($this->dropView());
    }

    private function dropView(): string
    {
        return <<<SQL
DROP VIEW IF EXISTS `data_view`;
SQL;
    }
    private function createView(): string
    {
        return <<<SQL
CREATE VIEW `data_view` AS

SELECT persona.rut rut_persona,
       persona2.fecha_ingreso  fecha_ingreso,
       persona2.fecha_egreso  fecha_egreso,
       c.nombre nombre_carrera,
       u.nombre universidad_carrera,
       tp.nombre postgrado_nombre,
       p.fecha_obtencion fecha_postgrado,
       u2.nombre universidad_postgrado,
       r.nombre nombre_rubro,
       empresa.nombre nombre_tipo_empresa,
       c2.fecha_inicio cargo_inicio,
       c2.fecha_termino cargo_termino,
       c2.sueldo sueldo_cargo,
       cargo.nombre nombre_cargo,
       a.nombre nombre_area
       
FROM   personas persona 
       INNER JOIN carrera_persona persona2 on persona.id = persona2.persona_id
       INNER JOIN carreras c on persona2.carrera_id = c.id
       INNER JOIN universidades u on c.universidad_id = u.id
       INNER JOIN postgrados p on persona.id = p.persona_id
       INNER JOIN tipo_postgrados tp on p.tipoPostgrado_id = tp.id
       INNER JOIN universidades u2 on p.universidad_id = u2.id
       INNER JOIN empresas e on persona.id = e.persona_id
       INNER JOIN rubros r on e.rubro_id = r.id
       INNER JOIN tipo_empresas empresa on e.tipo_empresa_id = empresa.id
       INNER JOIN cargos c2 on e.id = c2.empresa_id
       INNER JOIN nivel_cargos cargo on c2.nivel_cargo_id = cargo.id
       INNER JOIN areas a on c2.area_id = a.id
SQL;
    }
}
