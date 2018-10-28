<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarreraPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrera_persona', function (Blueprint $table) {
            $table->integer('persona_id')->unsigned()->index();
            $table->foreign('persona_id')->references('id')
                ->on('personas')->onDelete('cascade');

            $table->integer('carrera_id')->unsigned()->index();
            $table->foreign('carrera_id')->references('id')
                ->on('carreras')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona_carrera');
    }
}
