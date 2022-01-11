<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCPersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 60);
            $table->unsignedInteger('tipo_identificacion_id');
            $table->foreign('tipo_identificacion_id', 'fk_tipo_identificacion_personas')->references('id')->on('c_tipo_identificacion')->onDelete('restrict')->onUpdate('restrict');
            $table->string('identificacion', 20);
            $table->string('direccion',100)->nullable();
            $table->string('telefono',30)->nullable();
            $table->string('correo',100)->nullable();
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
        Schema::dropIfExists('c_personas');
    }
}
