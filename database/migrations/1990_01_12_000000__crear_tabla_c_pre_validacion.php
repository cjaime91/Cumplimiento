<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCPreValidacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_pre_validacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razon_social',150);
            $table->string('identificacion',15);
            $table->timestamp('fecha_h_solicitud');
            $table->string('respuesta',200)->nullable();
            $table->unsignedInteger('estado_id');
            $table->foreign('estado_id','fk_pre_validacion_estado')->references('id')->on('c_estados')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('c_pre_validacion');
    }
}
