<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\TarefasController;
use App\Http\Controllers\CategoriaController;
use App\Models\Categoria;
use App\Models\Client;
use App\Models\Produto;

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
Route::get('/clients/{id}', [ClientController::class, 'show'])->name('clients.show');


Route::get('/categorias/criar', [CategoriaController::class, 'create'])->name('categorias.create');

Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');


Route::prefix('tarefas')->group(function () {
    Route::get('/', [TarefasController::class, 'index'])->name('tarefas.index');
    Route::get('/create', [TarefasController::class, 'create'])->name('tarefas.create'); 
    Route::post('/', [TarefasController::class, 'store'])->name('tarefas.store');
});
