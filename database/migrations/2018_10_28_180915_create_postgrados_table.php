<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostgradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postgrados', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string("nombre");
            $table->date("fecha_obtencion");
            $table->integer('tipoPostgrado_id')->unsigned();
            $table->integer('persona_id')->unsigned();
            $table->integer('universidad_id')->unsigned();
            $table->foreign('tipoPostgrado_id')->references('id')
                ->on('tipo_postgrados')->onDelete('cascade');
            $table->foreign('persona_id')->references('id')
                ->on('personas')->onDelete('cascade');
            $table->foreign('universidad_id')->references('id')
                ->on('universidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postgrados');
    }
}
