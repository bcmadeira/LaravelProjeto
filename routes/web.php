<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\TarefasController;

/*
|--------------------------------------------------------------------------
| Rotas Web
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/{id}', [ClientController::class, 'show'])->name('clients.show');

Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');

Route::prefix('tarefas')->group(function () {
    Route::get('/', [TarefasController::class, 'index'])->name('tarefas.index');
    Route::get('/create', [TarefasController::class, 'create'])->name('tarefas.create'); 
    Route::post('/', [TarefasController::class, 'store'])->name('tarefas.store');
});
