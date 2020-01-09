<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoliticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('politicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('dias_clientes');
            $table->integer('dias_inventarios');
            $table->integer('dias_proveedores');
            $table->integer('ciclo_financieros');
            $table->float('dividendos',11,3);
            $table->float('utilidades_retenidas',11,3);
            $table->integer('dias_efectivo');
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
        Schema::dropIfExists('politicas');
    }
}
