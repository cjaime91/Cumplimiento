<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionTerceros;
use App\Models\agentes;
use App\Models\ciudades;
use App\Models\departamentos;
use App\Models\informacion_financiera;
use App\Models\paises;
use App\Models\terceros;
use App\Models\tipo_identificacion;
use App\Models\tipo_sociedad;
use App\Models\tipo_tercero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TercerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tipo_identificacion = tipo_identificacion::get();
        $tipo_sociedad = tipo_sociedad::get();
        $tipo_tercero = tipo_tercero::get();
        $terceros = terceros::orderBy('razon_social', 'asc')->get();
        $terceros_if = terceros::whereIn('tipo_tercero_id',array(2, 3))->orderBy('razon_social', 'asc')->get();
        $agentes = agentes::orderBy('razon_social_a', 'asc')->get();
        return view('pages.terceros.index', compact('tipo_identificacion', 'tipo_sociedad', 'terceros', 'agentes', 'tipo_tercero','terceros_if'));
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
    public function store(ValidacionTerceros $request)
    {
        $datos = $request->all();
        terceros::create($datos);
        return redirect('/terceros')->with('creacion_tercero', $datos['razon_social']);
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
        terceros::findOrFail($id)->update($datos);
        return redirect('/terceros')->with('actualizacion_tercero', $datos['razon_social']);
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

    public function getPaises()
    {
        try {
            $paises = paises::all();
            $response = ['data' => $paises];
        } catch (\Throwable $exception) {
        }
        return response()->json($response);
    }

    public function getCiudades(Request $request)
    {
        try {
            $id_pais = $request->input('id_pais');
            $ciudades = ciudades::when($id_pais, function ($query) use ($id_pais) {
                $query->where('pais_id', $id_pais);
            })->get();
            $response = ['data' => $ciudades];
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error al traer las ciudades de la base de datos'], 500);
        }
        return response()->json($response);
    }

    public function getDepartamentos()
    {
        try {
            $departamento = departamentos::all();
            $response = ['data' => $departamento];
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error al traer los departamentos de la base de datos'], 500);
        }
        return response()->json($response);
    }

    public function getIDTercero(Request $request)
    {
        try {
            $tercero = $request->input('tercero');
            $tercero = terceros::when($tercero, function ($query) use ($tercero) {
                $query->where('razon_social', $tercero);
            })->get(['id']);
            $response = ['data' => $tercero];
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error al traer las ciudades de la base de datos'], 500);
        }
        return response()->json($response);
    }

    public function getTerceros(Request $request)
    {
        try {
            $datos = terceros::leftjoin("c_tipo_identificacion AS tipo_ide", "c_terceros.tipo_identificacion_id", "=", "tipo_ide.id")
                ->leftjoin("c_tipo_sociedad AS tipo_soc", "c_terceros.tipo_sociedad_id", "=", "tipo_soc.id")
                ->leftjoin("c_ciudades AS ciudad", "c_terceros.ciudad_id", "=", "ciudad.id")
                ->leftjoin("c_departamentos AS dep", "c_terceros.departamento_id", "=", "dep.id")
                ->leftjoin("c_paises AS pais", "ciudad.pais_id", "=", "pais.id")
                ->get([
                    "c_terceros.*", DB::raw("IF(c_terceros.correo IS NULL,'',c_terceros.correo) AS email"),
                    DB::raw("IF(c_terceros.departamento_id IS NULL,'',dep.departamento) AS departamento"),
                    DB::raw("IF(c_terceros.direccion IS NULL,'',c_terceros.direccion) AS direccion"),
                    DB::raw("IF(c_terceros.telefono IS NULL,'',c_terceros.telefono) AS telefono"),
                    DB::raw("IF(c_terceros.actividad_economica IS NULL,'',c_terceros.actividad_economica) AS actividad_economica"),
                    "tipo_ide.abreviacion AS TIDE", "tipo_soc.abreviacion AS TSOC", "pais.pais AS PID", "pais.id AS IDP", "ciudad.ciudad",
                    "tipo_ide.tipo_identificacion AS identificacion_t", "tipo_soc.tipo_sociedad AS sociedad_t"
                ]);
            return DataTables::of($datos)->make(true);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error al traer las ciudades de la base de datos'], 500);
        }
    }

    public function getTerceroXtipo(Request $request)
    {
        try {
            $tercero_id = $request->input('tipo_tercero_id');
            $terceros = terceros::when($tercero_id, function ($query) use ($tercero_id) {
                $query->where('tipo_tercero_id', $tercero_id);
            })->get();
            $response = ['data' => $terceros];
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error al traer los terceros de la base de datos'], 500);
        }
        return response()->json($response);
    }
}
