<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre');
            $table->integer('persona_id')->unsigned();
            $table->foreign('persona_id')->references('id')
                ->on('personas')->onDelete('cascade');
            $table->integer('tipo_empresa_id')->unsigned();
            $table->foreign('tipo_empresa_id')->references('id')
                ->on('tipo_empresas')->onDelete('cascade');
            $table->integer('rubro_id')->unsigned();
            $table->foreign('rubro_id')->references('id')
                ->on('rubros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
