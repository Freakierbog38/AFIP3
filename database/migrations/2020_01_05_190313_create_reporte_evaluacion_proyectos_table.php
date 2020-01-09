<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReporteEvaluacionProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_evaluacion_proyectos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('anio');
            $table->float('flujo_positivo',11,3);
            $table->float('flujo_negativo',11,3);
            $table->float('flujos_incrementales',11,3);
            $table->float('mercancia_comercializadas',11,3);
            $table->float('capacidad_utilizada',11,3);
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
        Schema::dropIfExists('reporte_evaluacion_proyectos');
    }
}
