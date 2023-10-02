<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ClaseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/maestro',[MaestroController::class, 'index']);
Route::post('/maestro',[MaestroController::class, 'store']);
Route::get('/maestro/{textoBusqueda}',[MaestroController::class, 'show']);
Route::put('/maestro/{id}',[MaestroController::class, 'update']);
Route::delete('/maestro/{id}',[MaestroController::class, 'destroy']);
Route::post('/maestros/{maestroId}/clases/{claseId}',[MaestroController::class, 'asignarClase']);

Route::get('/estudiante',[EstudianteController::class, 'index']);
Route::post('/estudiante',[EstudianteController::class, 'store']);
Route::get('/estudiante/{nombre}',[EstudianteController::class, 'show']);
Route::put('/estudiante/{id}',[EstudianteController::class, 'update']);
Route::delete('/estudiante/{id}',[EstudianteController::class, 'destroy']);


Route::get('/clases/{claseId}',[ClaseController::class, 'viewClases']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
