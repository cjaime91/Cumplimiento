<?php

namespace App\Http\Controllers;

use App\Models\actividad_economica;
use App\Models\paises;
use App\Models\tipo_identificacion;
use App\Models\tipo_sociedad;
use Illuminate\Http\Request;

class TercerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_identificacion = tipo_identificacion::get();
        $tipo_sociedad = tipo_sociedad::get();
        $paises = paises::get();
        $actividades_economicas = actividad_economica::get();
        return view('pages.terceros.index', compact('tipo_identificacion', 'tipo_sociedad', 'paises','actividades_economicas'));
    }

    public function inf_fin()
    {
        return view('pages.terceros.inf_fin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
