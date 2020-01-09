<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinoApoyosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destino_apoyos', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->string('destino');
            // $table->float('monto',11,3);
            $table->float('diferido',11,3)->default(0);
            $table->float('circulante',11,3)->default(0);
            $table->float('fijo',11,3)->default(0);
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
        Schema::dropIfExists('destino_apoyos');
    }
}
