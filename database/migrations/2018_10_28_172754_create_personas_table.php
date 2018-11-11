<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string("nombre");
            $table->string("rut")->unique();
            $table->string("genero");
            $table->date("fecha_nacimiento");
            $table->date("fecha_ingreso");
            $table->date("fecha_egreso");
            $table->date("fecha_titulacion")->nullable();
            $table->integer("user_id")->unsigned()->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
