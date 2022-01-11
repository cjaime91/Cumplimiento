<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCTipoSociedad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_tipo_sociedad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_sociedad', 50);
            $table->string('abreviacion', 4);
            $table->double('calificacion', 20, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_tipo_sociedad');
    }
}
