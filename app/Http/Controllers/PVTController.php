<?php

namespace App\Http\Controllers;

use App\Models\persona_vinculo_tercero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PVTController extends Controller
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
        if ($request->isMethod('POST')) {
            persona_vinculo_tercero::create($datos);
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
    public function update(Request $request)
    {
        $datos = $request->all();
        if ($request->isMethod('PUT')) {
            if ($datos['tercero_id'] != null) {
                persona_vinculo_tercero::where([
                    ['persona_id', '=', $datos['persona_id']],
                    ['tercero_id', '=', $datos['tercero_id']]
                ])->update($datos);
            } else {
                persona_vinculo_tercero::where([
                    ['persona_id', '=', $datos['persona_id']],
                    ['agente_id', '=', $datos['agente_id']]
                ])->update($datos);
            }
        }
        //dd($datos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $datos = $request->all();
        if ($request->isMethod('DELETE')) {
            if ($datos['tercero_id'] != null) {
                persona_vinculo_tercero::where([
                    ['persona_id', '=', $datos['persona_id']],
                    ['tercero_id', '=', $datos['tercero_id']],
                    ['vinculo_id', '=', $datos['vinculo_id']]
                ])->delete();
            } else {
                persona_vinculo_tercero::where([
                    ['persona_id', '=', $datos['persona_id']],
                    ['agente_id', '=', $datos['agente_id']],
                    ['vinculo_id', '=', $datos['vinculo_id']]
                ])->delete();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getTercerosVinculados(Request $request)
    {
        try {
            $id_p = $request->input('id_p');
            $datos = persona_vinculo_tercero::leftjoin("c_terceros AS tercero", "c_persona_vinculo_tercero.tercero_id", "=", "tercero.id")
                ->leftjoin("c_agentes AS agente", "c_persona_vinculo_tercero.agente_id", "=", "agente.id")
                ->leftjoin("c_tipo_vinculos AS vinculo", "c_persona_vinculo_tercero.vinculo_id", "=", "vinculo.id")
                ->where('persona_id', '=', $id_p)
                ->get([
                    DB::raw("IF(tercero.`razon_social` IS NULL, 'Agente','Cliente / Proveedor') AS tipo_tercero"),
                    DB::raw("IF(tercero.`razon_social` IS NULL, agente.`razon_social_a`,tercero.`razon_social`) AS razon_social"), "vinculo.vinculo",
                    "c_persona_vinculo_tercero.*"
                ]);
            return DataTables::of($datos)->make(true);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error al traer las ciudades de la base de datos'], 500);
        }
    }
}
