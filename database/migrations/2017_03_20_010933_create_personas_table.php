<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatepersonasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nombre');
            $table->text('apellido');
            $table->text('cedula');
            $table->text('sexo');
            $table->text('fecha_nac');
            $table->integer('municipio_id');
            $table->text('direccion');
            $table->integer('contrato_id');
            $table->text('tipo_contrato');
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
        Schema::drop('personas');
    }
}
