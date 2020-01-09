<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapacidadInstaladasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capacidad_instaladas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('maximo_unidades_mes');
            $table->integer('maximo_unidades_anio');
            $table->float('porc_capacidad_utilizada_actual',11,3);
            $table->integer('id_empresa')->unsigned();
            $table->foreign('id_empresa')->references('id')->on('empresas')->onDelete('cascade');
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
        Schema::dropIfExists('capacidad_instaladas');
    }
}
