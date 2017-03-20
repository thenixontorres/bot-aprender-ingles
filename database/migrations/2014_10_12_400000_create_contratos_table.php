<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatecontratosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fecha_inicio');
            $table->string('tipo_contrato');
            $table->integer('clausula_id')->unsigned();
            $table->foreign('clausula_id')->references('id')->on('clausulas');
            $table->integer('plan_id')->unsigned();
            $table->foreign('plan_id')->references('id')->on('planes');
            $table->string('tiempo_pago');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contratos');
    }
}
