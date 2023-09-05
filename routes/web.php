<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('index');
});

Route::prefix('produtos')->group(function () {
    Route::get('/',[ProdutoController::class,'index'])->name('produto.index');
    //rotas para cadastro
    Route::get('/cadastrarProduto',[ProdutoController::class,'cadastrarProduto'])->name('cadastrar.produto');
    Route::post('/cadastrarProduto',[ProdutoController::class,'cadastrarProduto'])->name('cadastrar.produto');
    //rotas para actualizar
    Route::get('/atualizarProduto/{id}',[ProdutoController::class,'atualizarProduto'])->name('atualizar.produto');
    Route::put('/atualizarProduto/{id}',[ProdutoController::class,'atualizarProduto'])->name('atualizar.produto');
    //rota para eliminar produto
    Route::delete('/delete',[ProdutoController::class,'delete'])->name('produto.delete');
});

Route::prefix('clientes')->group(function () {
    Route::get('/',[ClienteController::class,'index'])->name('cliente.index');
    //rotas para cadastro
    Route::get('/cadastrarCliente',[ClienteController::class,'cadastrarCliente'])->name('cadastrar.cliente');
    Route::post('/cadastrarCliente',[ClienteController::class,'cadastrarCliente'])->name('cadastrar.cliente');
    //rotas para actualizar
    Route::get('/atualizarCliente/{id}',[ClienteController::class,'atualizarCliente'])->name('atualizar.cliente');
    Route::put('/atualizarCliente/{id}',[ClienteController::class,'atualizarCliente'])->name('atualizar.cliente');
    //rota para eliminar produto
    Route::delete('/delete',[ClienteController::class,'delete'])->name('cliente.delete');
});


