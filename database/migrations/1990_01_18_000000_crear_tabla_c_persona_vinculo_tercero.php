<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCPersonaVinculoTercero extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_persona_vinculo_tercero', function (Blueprint $table) {
            $table->unsignedInteger('persona_id');
            $table->foreign('persona_id', 'fk_persona_vinculo')->references('id')->on('c_personas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('tercero_id')->nullable();
            $table->foreign('tercero_id', 'fk_tercero_vinculo')->references('id')->on('c_terceros')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('agente_id')->nullable();
            $table->foreign('agente_id', 'fk_agente_vinculo')->references('id')->on('c_agentes')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('vinculo_id');
            $table->foreign('vinculo_id', 'fk_vinculo_vin')->references('id')->on('c_tipo_vinculos')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_persona_vinculo_tercero');
    }
}
