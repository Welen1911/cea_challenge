<?php

use App\Http\Controllers\Filme\FilmeController;
use App\Http\Controllers\User\UserController;
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

Route::get('/', [FilmeController::class, 'index'])->name('list.film');

Route::get('/cadastrar_filme', [FilmeController::class, 'create'])->name('create.film');
Route::post('/cadastrar_filme', [FilmeController::class, 'store'])->name('create.filmStore');


Route::get('/show_filme/{id}', [FilmeController::class, 'show'])->name('show.film');

Route::delete('/delete_filme/{id}', [FilmeController::class, 'destroy'])->name('delete.film');

Route::middleware(['auth'])->group(function () {
    Route::get('/atualizar_filme/{id}', [FilmeController::class, 'edit'])->name('edit.film');
    Route::put('/atualizar_filme/{id}', [FilmeController::class, 'update'])->name('update.film');

    Route::put('/show_filme/{id}', [FilmeController::class, 'buy'])->name('buy.film');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
});
