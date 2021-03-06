<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReporteEvaluacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_evaluacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('valor_presente_neto',11,3);
            $table->float('relacion_beneficio_costo',11,3);
            $table->float('tasa_interna_retorno',11,3);
            $table->float('payback',11,3);
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
        Schema::dropIfExists('reporte_evaluacions');
    }
}
