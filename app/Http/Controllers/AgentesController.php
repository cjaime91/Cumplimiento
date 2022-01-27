<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionAgentes;
use App\Models\agentes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AgentesController extends Controller
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
    public function store(ValidacionAgentes $request)
    {
        $datos = $request->all();
        agentes::create($datos);
        return redirect('/terceros')->with('creacion_agente', $datos['razon_social_a']);
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
        agentes::findOrFail($id)->update($datos);
        return redirect('/terceros')->with('actualizacion_agente', $datos['razon_social_a']);
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

    public function getIDAgente(Request $request)
    {
        try {
            $ag = $request->input('agente');
            $agente = agentes::when($ag, function ($query) use ($ag) {
                $query->where('razon_social_a', $ag);
            })->get(['id']);
            $response = ['data' => $agente];
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error al traer las ciudades de la base de datos'], 500);
        }
        return response()->json($response);
    }

    public function getAgentes(Request $request)
    {
        try {
            $datos = agentes::leftjoin("c_ciudades AS ciudad", "c_agentes.ciudad_id_a", "=", "ciudad.id")
            ->leftjoin("c_paises AS pais", "ciudad.pais_id", "=", "pais.id")
            ->get([
                "c_agentes.*", DB::raw("IF(c_agentes.correo_a IS NULL,'',c_agentes.correo_a) AS email"),
                DB::raw("IF(c_agentes.direccion_a IS NULL,'',c_agentes.direccion_a) AS direccion"),
                DB::raw("IF(c_agentes.telefono_a IS NULL,'',c_agentes.telefono_a) AS telefono"),
                "pais.pais AS PID", "pais.id AS IDP", "ciudad.ciudad"
            ]);
            return DataTables::of($datos)->make(true);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error al traer las ciudades de la base de datos'], 500);
        }
    }
}
