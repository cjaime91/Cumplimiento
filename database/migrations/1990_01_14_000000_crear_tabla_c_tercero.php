<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCTercero extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_terceros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razon_social',100);
            $table->unsignedInteger('tipo_identificacion_id');
            $table->foreign('tipo_identificacion_id','fk_tercero_tipo_identificacion')->references('id')->on('c_tipo_identificacion')->onDelete('restrict')->onUpdate('restrict');
            $table->string('identificacion',15);
            $table->date('fecha_constitucion')->nullable();
            $table->unsignedInteger('tipo_sociedad_id');
            $table->foreign('tipo_sociedad_id','fk_tercero_tsociedad')->references('id')->on('c_tipo_sociedad')->onUpdate('restrict')->onDelete('restrict');
            $table->string('direccion',100)->nullable();
            $table->string('telefono',30)->nullable();
            $table->string('correo',60)->nullable();
            $table->unsignedInteger('ciudad_id')->nullable();
            $table->foreign('ciudad_id','fk_tercero_ciudad')->references('id')->on('c_ciudades')->onUpdate('restrict')->onDelete('restrict');
            $table->unsignedInteger('departamento_id')->nullable();
            $table->foreign('departamento_id','fk_tercero_departamento')->references('id')->on('c_departamentos')->onUpdate('restrict')->onDelete('restrict');
            $table->string('barrio',40)->nullable();
            $table->unsignedInteger('actividad_economica_id');
            $table->foreign('actividad_economica_id','fk_tercero_actividad_economica')->references('id')->on('c_actividades_economicas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('c_terceros');
    }
}
