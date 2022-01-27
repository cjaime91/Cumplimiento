<?php

namespace App\Http\Controllers;

use App\Models\persona_vinculo_tercero;
use App\Models\personas;
use App\Models\tipo_identificacion;
use App\Models\tipo_vinculos;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_identificacion = tipo_identificacion::get();
        $tipo_vinculo = tipo_vinculos::get();
        return view('pages.personas.index', compact('tipo_identificacion', 'tipo_vinculo'));
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
        personas::create($datos);
        if ($request->has('tercero')) {
            if ($datos['tercero'] == 'tercero') {
                $datos['tercero_id'] = $datos['tercero_id'];
                $datos['agente_id'] = null;
            } else {
                if ($datos['tercero'] == 'agente') {
                    $datos['agente_id'] = $datos['tercero_id'];
                    $datos['tercero_id'] = null;
                }
            }
        }
        $persona_id = personas::where('identificacion', '=', $datos['identificacion'])->get();
        foreach ($persona_id as $p) {
            if ($p->identificacion == $datos['identificacion']) {
                $datos['persona_id'] = $p->id;
            }
        }
        persona_vinculo_tercero::create($datos);
        //dd($datos);
        return redirect('/personas');
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
        personas::findOrFail($id)->update($datos);
        /*if ($request->has('tercero')) {
            if ($datos['tercero'] == 'tercero') {
                $datos['tercero_id'] = $datos['tercero_id'];
                $datos['agente_id'] = null;
            } else {
                if ($datos['tercero'] == 'agente') {
                    $datos['agente_id'] = $datos['tercero_id'];
                    $datos['tercero_id'] = null;
                }
            }
        }
        $persona_id = personas::where('identificacion', '=', $datos['identificacion'])->get();
        foreach ($persona_id as $p) {
            if ($p->identificacion == $datos['identificacion']) {
                $datos['persona_id'] = $p->id;
            }
        }*/
        //persona_vinculo_tercero::create($datos);
        return redirect('/personas');
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

    /**
     * 
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function getPersonas(Request $request)
    {
        try {
            $datos = personas::leftJoin("c_tipo_identificacion AS tipo_ide", "c_personas.tipo_identificacion_id", "=", "tipo_ide.id")
            ->get(['c_personas.*', 'tipo_ide.tipo_identificacion']);
            return DataTables::of($datos)->make(true);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error al traer las ciudades de la base de datos'], 500);
        }
    }

    public function getIDPersona(Request $request)
    {
        try {
            $p_data = $request->input('persona');
            $persona = personas::when($p_data, function ($query) use ($p_data) {
                $query->where('identificacion', $p_data);
            })->get(['id']);
            $response = ['data' => $persona];
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error al traer las ciudades de la base de datos'], 500);
        }
        return response()->json($response);
    }
}
