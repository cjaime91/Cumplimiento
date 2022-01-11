<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCFactRiesgo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_fact_riesgo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('factor',100);
            $table->unsignedInteger('tercero_id')->nullable();
            $table->foreign('tercero_id','fk_fact_riesgo_tercero')->references('id')->on('c_terceros')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('agente_id')->nullable();
            $table->foreign('agente_id','fk_fact_riesgo_agente')->references('id')->on('c_agentes')->onDelete('restrict')->onUpdate('restrict');
            $table->double('impacto',20,2)->nullable();
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
        Schema::dropIfExists('c_fact_riesgo');
    }
}
