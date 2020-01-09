<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReporteAmortizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_amortizacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('anio');
            $table->integer('mes');
            $table->float('saldo',11,3);
            $table->float('pago_capital',11,3);
            $table->float('pago_intereses',11,3);
            $table->float('pago_total',11,3);
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
        Schema::dropIfExists('reporte_amortizacions');
    }
}
