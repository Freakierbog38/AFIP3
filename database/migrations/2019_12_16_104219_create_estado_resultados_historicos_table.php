<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadoResultadosHistoricosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_resultados_historicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('ventas_netas',11,3);
            $table->float('costo_ventas',11,3);
            $table->float('utilidad_bruta',11,3);
            $table->float('gastos_operacion',11,3);
            $table->float('UAFIRDA',11,3);
            $table->float('deprecia_amortiza',11,3);
            $table->float('gtos_prod_financieros',11,3);
            $table->float('UAFIR',11,3);
            $table->float('impuestos',11,3);
            $table->float('uair',11,3);

            $table->float('utilidad_neta',11,3);
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
        Schema::dropIfExists('estado_resultados_historicos');
    }
}
