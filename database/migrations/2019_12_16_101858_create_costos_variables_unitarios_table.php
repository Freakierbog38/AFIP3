<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostosVariablesUnitariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costos_variables_unitarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('concepto');
            $table->float('costo_unitario',11,2)->nullable()->default(null);
            $table->float('porcentaje_ventas',11,2)->nullable()->default(null);
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
        Schema::dropIfExists('costos_variables_unitarios');
    }
}
