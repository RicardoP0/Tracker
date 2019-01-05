<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtroAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otro_areas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('cargo_id')->unsigned();
            $table->string('nombre_area');
            $table->foreign('cargo_id')->references('id')
                ->on('cargos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('otro_areas');
    }
}
