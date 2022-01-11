<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCCiudades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_ciudades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ciudad', 50);
            $table->unsignedInteger('pais_id');
            $table->foreign('pais_id', 'fk_pais_ciudad')->references('id')->on('c_paises')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_ciudades');
    }
}
