<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReporteBalanceGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_balance_generals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('activo_efectivo', 11, 2);
            $table->float('cuentas_cobrar', 11, 2);
            $table->float('inventario', 11, 2);
            $table->float('otros_activos', 11, 2);
            $table->float('total_activo_circulante', 11, 2);
            $table->float('activo_fijo_neto', 11, 2);
            $table->float('total_activo_diferido', 11, 2);
            $table->float('total_activo', 11, 2);

            $table->float('proveedores', 11, 2);
            $table->float('otros_pasivos_circulantes', 11, 2);
            $table->float('documentos_pagar', 11, 2);
            $table->float('total_pasivo_circulante', 11, 2);
            $table->float('bancos_largo_plazo', 11, 2);
            $table->float('total_pasivo_largo_plazo', 11, 2);
            $table->float('total_pasivo', 11, 2);
            
            $table->float('total_capital', 11, 2);
            $table->float('pasivo_capital', 11, 2);
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
        Schema::dropIfExists('reporte_balance_generals');
    }
}
