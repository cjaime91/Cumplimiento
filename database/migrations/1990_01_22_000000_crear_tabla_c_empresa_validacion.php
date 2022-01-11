<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCEmpresaValidacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_empresa_validacion', function (Blueprint $table) {
            $table->unsignedInteger('empresa_id');
            $table->foreign('empresa_id','fk_empresa_validacion')->references('id')->on('c_empresas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('validacion_id');
            $table->foreign('validacion_id','fk_validacion_validacion')->references('id')->on('c_validacion')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('pre_validacion_id');
            $table->foreign('pre_validacion_id','fk_pre_validacion_validacion')->references('id')->on('c_pre_validacion')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_empresa_validacion');
    }
}
