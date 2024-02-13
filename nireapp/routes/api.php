<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtasaController;
use App\Http\Controllers\KategoriaController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//ATASAk

Route::get('/atasak', [AtasaController::class, 'prueba'])->name('api.atasak');

Route::post('/atasak', [AtasaController::class, 'store']);
Route::get('/atasak', [AtasaController::class, 'index']);
Route::get('/atasak/{id}', [AtasaController::class, 'show']);
Route::put('/atasak/{id}', [AtasaController::class, 'update']);
Route::delete('/atasak/{id}', [AtasaController::class, 'destroy']);