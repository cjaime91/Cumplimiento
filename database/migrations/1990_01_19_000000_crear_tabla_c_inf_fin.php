<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCInfFin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_inf_fin', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tercero_id')->nullable();
            $table->foreign('tercero_id', 'fk_inf_fin_tercero')->references('id')->on('c_terceros')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('agente_id')->nullable();
            $table->foreign('agente_id', 'fk_inf_fin_agente')->references('id')->on('c_agentes')->onDelete('restrict')->onUpdate('restrict');
            $table->integer('anio')->nullable();
            $table->timestamp('fecha_h_ingreso_inf');
            $table->double('activo_cte', 20, 2)->nullable();
            $table->double('activo_total', 20, 2)->nullable();
            $table->double('pasivo_cte', 20, 2)->nullable();
            $table->double('pasivo_total', 20, 2)->nullable();
            $table->double('utilidad_oper', 20, 2)->nullable();
            $table->double('patrimonio', 20, 2)->nullable();
            $table->double('inventario', 20, 2)->nullable();
            $table->double('ingresos_mensuales', 20, 2)->nullable();
            $table->double('egresos_mensuales', 20, 2)->nullable();
            $table->double('otros_ingresos', 20, 2)->nullable();
            $table->double('activos', 20, 2)->nullable();
            $table->double('pasivos', 20, 2)->nullable();
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
        Schema::dropIfExists('c_inf_fin');
    }
}
