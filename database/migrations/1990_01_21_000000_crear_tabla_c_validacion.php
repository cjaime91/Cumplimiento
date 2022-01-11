<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCValidacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_validacion', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tercero_id')->nullable();
            $table->foreign('tercero_id', 'fk_validacion_tercero')->references('id')->on('c_terceros')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('agente_id')->nullable();
            $table->foreign('agente_id', 'fk_validacion_agente')->references('id')->on('c_agentes')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamp('fecha_h_solicitud')->nullable();
            $table->timestamp('fecha_h_validacion')->nullable();
            $table->timestamp('fecha_h_vencimiento')->nullable();
            $table->timestamp('fecha_h_respuesta')->nullable();
            $table->string('Observaciones')->nullable();
            $table->double('puntaje', 20, 2)->nullable();
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
        Schema::dropIfExists('c_validacion');
    }
}
