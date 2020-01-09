<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesgloseActivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desglose_activos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('concepto');
            $table->integer('cantidad');
            $table->float('valor_historico',11,3);
            $table->float('total',11,3);
            $table->float('depreciacion',11,3);
            $table->integer('anios_restantes');
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
        Schema::dropIfExists('desglose_activos');
    }
}
