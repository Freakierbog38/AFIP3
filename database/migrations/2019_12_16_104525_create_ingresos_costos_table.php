<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresosCostosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos_costos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('anio');
            $table->float('incremento_precios',11,2);
            $table->float('incremento_unidades_vendidas',11,2);
            $table->float('incremento_ventas',11,2);
            $table->float('inc_ventas_acumuladas',11,2);
            $table->float('inc_costos_fijos',11,2);
            $table->float('inc_costos_variables',11,2);
            $table->boolean('apoyo');
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
        Schema::dropIfExists('ingresos_costos');
    }
}
