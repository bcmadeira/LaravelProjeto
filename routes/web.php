<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Models\Categoria;
use App\Models\Client;
use App\Models\Produto;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/teste/{idcliente}', function ($idcliente) {
//     return Client::get('nome') ;
// });


Route::get('/produtos', [ProdutoController::class, 'index']);

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

Route::get('/clients/{id}', [ClientController::class, 'show'])->name('clients.show');


Route::get('/categorias/criar', [CategoriaController::class, 'create'])->name('categorias.create');

Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');


// Route::get('/produtos/{idProduto}', function ($idProduto) {
//     return Produto::get() ;
// });
