<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReporteEstadoResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_estado_resultados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('anio');
            $table->float('ventas_brutas',11,2);
            $table->float('costo_ventas',11,2);
            $table->float('ut_bruta',11,2);
            $table->float('gastos_admon_ventas',11,2);
            $table->float('UAFIRDA',11,2);
            $table->float('depre_amort',11,2);
            $table->float('ut_operacion',11,2);
            $table->float('gastos_finan',11,2);
            $table->float('ut_antes_impuestos',11,2);
            $table->float('ISRPTU',11,2);
            $table->float('ut_neta',11,2);
            $table->float('dividendos',11,2);
            $table->float('ut_retenida',11,2);
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
        Schema::dropIfExists('reporte_estado_resultados');
    }
}
