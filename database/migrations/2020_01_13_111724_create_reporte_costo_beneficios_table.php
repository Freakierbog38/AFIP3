<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReporteCostoBeneficiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_costo_beneficios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('anio');
            $table->float('tdofa',11,3);
            $table->float('ingresos_totales',11,3);
            $table->float('ingresos_actualizados',11,3);
            $table->float('ctos_gtos_totales',11,3);
            $table->float('ctos_gtos_actualizados',11,3);
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
        Schema::dropIfExists('reporte_costo_beneficios');
    }
}
