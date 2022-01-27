<?php

namespace App\Http\Controllers;

use App\Models\agentes;
use App\Models\informacion_financiera;
use App\Models\terceros;
use Illuminate\Http\Request;

class InfFinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $datos = $request->all();
        //dd($datos);
        if ($request->has('tercero_id')) {
            $tercero = terceros::findOrFail($datos['tercero_id'])->get();
            foreach ($tercero as $t) {
                if ($t->id == $datos['tercero_id']) {
                    $datos["razon_social"] = $t->razon_social;
                }
            }
            informacion_financiera::create($datos);
            return redirect('/terceros')->with('creacion_if_tercero', $datos['razon_social']);
        }
        if ($request->has('agente_id')) {
            $agente = agentes::where('id', '=', $datos['agente_id'])->get();
            foreach ($agente as $a) {
                if ($a->id == $datos['agente_id']) {
                    $datos["razon_social"] = $a->razon_social_a;
                }
            }
            informacion_financiera::create($datos);
            return redirect('/terceros')->with('creacion_if_agente', $datos['razon_social']);
        }
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
        $datos = $request->all();
        if ($request->has('tercero_id')) {
            $tercero = terceros::findOrFail($datos['tercero_id'])->get();
            foreach ($tercero as $t) {
                if ($t->id == $datos['tercero_id']) {
                    $datos["razon_social"] = $t->razon_social;
                }
            }
            informacion_financiera::findOrFail($id)->update($datos);
            return redirect('/terceros')->with('creacion_if_tercero', $datos['razon_social']);
        }
        if ($request->has('agente_id')) {
            $agente = agentes::where('id', '=', $datos['agente_id'])->get();
            foreach ($agente as $a) {
                if ($a->id == $datos['agente_id']) {
                    $datos["razon_social"] = $a->razon_social_a;
                }
            }
            informacion_financiera::findOrFail($id)->update($datos);
            return redirect('/terceros')->with('creacion_if_agente', $datos['razon_social']);
        }
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

    public function getanios_tercero(Request $request)
    {
        try {
            $id_tercero = $request->input('id_tercero');
            $inf_fin = informacion_financiera::when($id_tercero, function ($query) use ($id_tercero) {
                $query->where('tercero_id', $id_tercero);
            })->whereNotnull('tercero_id')->get();
            $response = ['data' => $inf_fin];
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error al traer las ciudades de la base de datos'], 500);
        }
        return response()->json($response);
    }

    public function get_Inf_Fin_tercero(Request $request)
    {
        try {
            $id_tercero = $request->input('tercero');
            $anio = $request->input('anio');
            $inf_fin = informacion_financiera::where([['tercero_id', '=', $id_tercero], ['anio', '=', $anio]])->whereNotnull('tercero_id')->get();
            $response = ['data' => $inf_fin];
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error al traer las ciudades de la base de datos'], 500);
        }
        return response()->json($response);
    }

    public function getanios_agente(Request $request)
    {
        try {
            $id_agente = $request->input('id_agente');
            $inf_fin = informacion_financiera::when($id_agente, function ($query) use ($id_agente) {
                $query->where('agente_id', $id_agente);
            })->whereNotnull('agente_id')->get();
            $response = ['data' => $inf_fin];
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error al traer las ciudades de la base de datos'], 500);
        }
        return response()->json($response);
    }

    public function get_Inf_Fin_agente(Request $request)
    {
        try {
            $id_agente = $request->input('agente');
            $anio = $request->input('anio');
            $inf_fin = informacion_financiera::where([['agente_id', '=', $id_agente], ['anio_a', '=', $anio]])->whereNotnull('agente_id')->get();
            $response = ['data' => $inf_fin];
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error al traer las ciudades de la base de datos'], 500);
        }
        return response()->json($response);
    }
}
