<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCDevoluciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_devoluciones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('validacion_id');
            $table->foreign('validacion_id', 'fk_devolucion_validacion')->references('id')->on('c_validacion')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamp('fecha_h_devolucion');
            $table->unsignedInteger('motivo_id');
            $table->foreign('motivo_id', 'fk_motivo_devolucion')->references('id')->on('c_motivos_devolucion')->onDelete('restrict')->onUpdate('restrict');
            $table->string('observacion', 150)->nullable();
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
        Schema::dropIfExists('c_devoluciones');
    }
}
