<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostulantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulados', function (Blueprint $table) {
            $table->bigIncrements('id_postulados');
            $table->string('nb_nombres');
            $table->string('nb_apellidos');
            $table->string('nu_cedula');
            $table->integer('cargos_id')->unsigned();
            $table->foreign('cargos_id')->references('id_cargos')->on('cargos');
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
        Schema::dropIfExists('postulados');
    }
}
