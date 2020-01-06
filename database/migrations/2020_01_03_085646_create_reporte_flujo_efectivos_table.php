<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReporteFlujoEfectivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_flujo_efectivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('anio');
            $table->float('ingresos_ventas', 11,2);
            $table->float('apoyo', 11,2);
            $table->float('aportaciones', 11,2);
            $table->float('total_fuentes', 11,2);
            $table->float('costo_ventas', 11,2);
            $table->float('gastos_operacion', 11,2);
            $table->float('inc_capital_trabajo', 11,2);
            $table->float('pagos_capital', 11,2);
            $table->float('pagos_interes', 11,2);
            $table->float('inversion', 11,2);
            $table->float('impuestos', 11,2);
            $table->float('total_aplicaciones', 11,2);
            $table->float('flujo_efectivo_neto', 11,2);
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
        Schema::dropIfExists('reporte_flujo_efectivos');
    }
}
