<?php

use App\Http\Controllers\AgentesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfFinController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\PVTController;
use App\Http\Controllers\SolValidacionController;
use App\Http\Controllers\TercerosController;
use App\Http\Controllers\ValidacionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('/sol_validacion', [SolValidacionController::class, 'index'])->name('sol_validacion');
Route::get('/validacion', [ValidacionController::class, 'index'])->name('validacion');

/**RUTAS TERCEROS */
Route::get('/terceros', [TercerosController::class, 'index'])->name('terceros');
Route::get('/terceros/getPaises', [TercerosController::class, 'getPaises'])->name('getPaises');
Route::get('/terceros/getCiudades', [TercerosController::class, 'getCiudades'])->name('getCiudades');
Route::get('/terceros/getDepartamentos', [TercerosController::class, 'getDepartamentos'])->name('getDepartamentos');
Route::post('/terceros/guardar', [TercerosController::class, 'store'])->name('guardar_tercero');
Route::put('/terceros/{id}', [TercerosController::class, 'update'])->name('actualizar_tercero');
Route::get('/terceros/getIDTercero', [TercerosController::class, 'getIDTercero'])->name('getIDTercero');
Route::get('/terceros/getTerceros', [TercerosController::class, 'getTerceros'])->name('getTerceros');

/**RUTAS AGENTES */
Route::post('/agentes/guardar', [AgentesController::class, 'store'])->name('guardar_agente');
Route::put('/agentes/{id}', [AgentesController::class, 'update'])->name('actualizar_agente');
Route::get('/agentes/getIDAgente', [AgentesController::class, 'getIDAgente'])->name('getIDAgente');
Route::get('/agentes/getAgentes', [AgentesController::class, 'getAgentes'])->name('getAgentes');

/**RUTAS INFORMACION FINANCIERA */
Route::post('/inf_fin/guardar', [InfFinController::class, 'store'])->name('guardar_inf_fin');
Route::put('/inf_fin/{id}', [InfFinController::class, 'update'])->name('actualizar_inf_fin');
Route::get('/inf_fin/getanios_tercero', [InfFinController::class, 'getanios_tercero'])->name('getanios_tercero');
Route::get('/inf_fin/get_Inf_Fin_tercero', [InfFinController::class, 'get_Inf_Fin_tercero'])->name('get_Inf_Fin_tercero');
Route::get('/inf_fin/getanios_agente', [InfFinController::class, 'getanios_agente'])->name('getanios_agente');
Route::get('/inf_fin/get_Inf_Fin_agente', [InfFinController::class, 'get_Inf_Fin_agente'])->name('get_Inf_Fin_agente');

/**RUTAS PERSONAS */
Route::get('/personas', [PersonasController::class, 'index'])->name('personas');
Route::post('/personas/guardar', [PersonasController::class, 'store'])->name('guardar_persona');
Route::put('/personas/{id}', [PersonasController::class, 'update'])->name('actualizar_persona');
Route::get('/personas/getPersonas', [PersonasController::class, 'getPersonas'])->name('getPersonas');
Route::get('/personas/getIDPersona', [PersonasController::class, 'getIDPersona'])->name('getIDPersona');


Route::get('/PVT/getTercerosVinculados', [PVTController::class, 'getTercerosVinculados'])->name('getTercerosVinculados');
Route::post('/PVT/guardar_vinculo', [PVTController::class, 'store'])->name('guardar_vinculo');
Route::put('/PVT/actualizar_pvt', [PVTController::class, 'update'])->name('actualizar_pvt');
Route::delete('/PVT/eliminar_vinculo', [PVTController::class, 'destroy'])->name('eliminar_vinculo');
