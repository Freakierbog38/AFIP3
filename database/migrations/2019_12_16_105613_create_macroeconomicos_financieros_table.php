<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMacroeconomicosFinancierosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('macroeconomicos_financieros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('inflacion',11,2);
            $table->float('tipo_cambio',11,2);
            $table->float('TIEE',11,2);
            $table->float('CETES',11,2);
            $table->float('ISR',11,2);
            $table->float('TREMA',11,2);
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
        Schema::dropIfExists('macroeconomicos_financieros');
    }
}
