<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCDocumentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_documento',100);
            $table->unsignedInteger('tipo_doc_id');
            $table->foreign('tipo_doc_id','fk_doc_tipo')->references('id')->on('c_tipo_documento')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('tercero_id')->nullable();
            $table->foreign('tercero_id','fk_doc_tercero')->references('id')->on('c_terceros')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('agente_id')->nullable();
            $table->foreign('tipo_doc_id','fk_doc_agente')->references('id')->on('c_agentes')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('vigencia_id');
            $table->foreign('vigencia_id','fk_doc_vigencia')->references('id')->on('c_vigencia_documentos')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamp('fecha_h_generado')->nullable();
            $table->timestamp('fecha_h_vencimiento')->nullable();
            $table->unsignedInteger('estado_id')->nullable();
            $table->foreign('estado_id','fk_doc_estado')->references('id')->on('c_estados')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('c_documentos');
    }
}
