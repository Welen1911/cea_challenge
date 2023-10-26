<?php

use App\Http\Controllers\Filme\FilmeController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/cadastrar_filme', [FilmeController::class, 'create'])->name('create.film');
Route::post('/cadastrar_filme', [FilmeController::class, 'store'])->name('create.filmStore');

Route::get('/listar_filmes', [FilmeController::class, 'index'])->name('list.film');

Route::get('/show_filme/{id}', [FilmeController::class, 'show'])->name('show.film');

Route::get('/atualizar_filme/{id}', [FilmeController::class, 'edit'])->name('edit.film');
Route::put('/atualizar_filme/{id}', [FilmeController::class, 'update'])->name('update.film');

Route::delete('/delete_filme/{id}', [FilmeController::class, 'destroy'])->name('delete.film');
