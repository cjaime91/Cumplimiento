<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonasController;
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
Route::get('/personas', [PersonasController::class, 'index'])->name('personas');
Route::get('/terceros', [TercerosController::class, 'index'])->name('terceros');
Route::get('/inf_fin', [TercerosController::class, 'inf_fin'])->name('inf_fin');
Route::get('/validacion', [ValidacionController::class, 'index'])->name('validacion');
