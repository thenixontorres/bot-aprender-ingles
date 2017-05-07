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
            $table->string('numero');
            $table->string('fecha_inicio');
            $table->string('fecha_vencimiento');
            $table->string('tipo_contrato');
            $table->integer('clausula_id')->unsigned();
            $table->foreign('clausula_id')->references('id')->on('clausulas');
            $table->integer('plan_id')->unsigned();
            $table->foreign('plan_id')->references('id')->on('planes');
            $table->string('tiempo_pago');
            $table->string('monto_total');
            $table->string('monto_inicial');
            $table->string('estado');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('ruta_id')->unsigned();
            $table->foreign('ruta_id')->references('id')->on('rutas');
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
