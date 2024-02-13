<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtasaController;
use App\Http\Controllers\KategoriaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('app');
});


// Route::get('/atasak', function () {
//     return view('atasak.index');
// });
//ATASAK
Route::get('/atasak', [AtasaController::class, 'index'])->name('atasak');
Route::post('/atasak', [AtasaController::class, 'store'])->name('atasak.store');
Route::get('/atasak/{id}/edit', [AtasaController::class, 'edit'])->name('atasak.edit');
Route::patch('/atasak/{id}', [AtasaController::class, 'update'])->name('atasak.update');
Route::delete('/atasak/{id}', [AtasaController::class, 'destroy'])->name('atasak.destroy');

//KATEGORIAK
Route::resource('kategoria', KategoriaController::class);
Route::get('/kategoria', [KategoriaController::class, 'index'])->name('kategoria.index');
Route::post('/kategoria', [KategoriaController::class, 'store'])->name('kategoria.store');
Route::get('/kategoria/{kategoria}', [KategoriaController::class, 'show'])->name('kategoria.show');
Route::get('/kategoria/{id}/edit', [KategoriaController::class, 'edit'])->name('kategoria.edit');
Route::patch('/kategoria/{id}', [KategoriaController::class, 'update'])->name('kategoria.update');
Route::delete('/kategoria/{kategoria}', [KategoriaController::class, 'destroy'])->name('kategoria.destroy');