<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date("fecha_inicio");
            $table->date("fecha_termino");
            $table->integer("sueldo");
            $table->integer('nivel_cargo_id')->unsigned();
            $table->integer('empresa_id')->unsigned();
            $table->integer('area_id')->unsigned();
            $table->foreign('nivel_cargo_id')->references('id')
                ->on('nivel_cargos')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')
                ->on('empresas')->onDelete('cascade');
            $table->foreign('area_id')->references('id')
                ->on('areas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargos');
    }
}
