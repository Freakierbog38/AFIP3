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
            $table->float('valor_presente_neto');
            $table->float('relacion_beneficio-costo');
            $table->float('tasa_interna_retorno');
            $table->float('payback');
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
