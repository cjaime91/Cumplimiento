<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCAgentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_agentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razon_social',100);
            $table->string('identificacion',20);
            $table->string('direccion',100)->nullable();
            $table->string('telefono',20)->nullable();
            $table->string('correo',50)->nullable();
            $table->unsignedInteger('ciudad_id_a');
            $table->foreign('ciudad_id_a','fk_ciudad_agente')->references('id')->on('c_ciudades')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('c_agentes');
    }
}
