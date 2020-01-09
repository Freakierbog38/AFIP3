<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasivosActualesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasivos_actuales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('clave');
            $table->string('tipo');
            $table->float('monto',11,3);
            $table->string('tipo_tasa');
            $table->float('interes',11,3);
            $table->integer('plazo');
            $table->integer('gracia');
            $table->integer('pagos');
            $table->integer('adicionales_proyecto');
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
        Schema::dropIfExists('pasivos_actuales');
    }
}
