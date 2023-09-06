<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VendaController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->group(function () {
    Route::get('/',[DashboardController::class,'index'])->name('dashboard.index');
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

Route::prefix('vendas')->group(function () {
    Route::get('/',[VendaController::class,'index'])->name('venda.index');
    //rotas para cadastro
    Route::get('/cadastrarVenda',[VendaController::class,'cadastrarVenda'])->name('cadastrar.venda');
    Route::post('/cadastrarVenda',[VendaController::class,'cadastrarVenda'])->name('cadastrar.venda');
    Route::get('/enviaComprovantePorEmail/{id}',[VendaController::class,'enviaComprovantePorEmail'])->name('enviaComprovantePorEmail.venda');
});

Route::prefix('usuario')->group(function () {
    Route::get('/',[UsuarioController::class,'index'])->name('usuario.index');

    Route::get('/cadastrarUsuario',[UsuarioController::class,'cadastrarUsuario'])->name('cadastrar.usuario');
    Route::post('/cadastrarUsuario',[UsuarioController::class,'cadastrarUsuario'])->name('cadastrar.usuario');
    //rotas para actualizar
    Route::get('/atualizarUsuario/{id}',[UsuarioController::class,'atualizarUsuario'])->name('atualizar.usuario');
    Route::put('/atualizarUsuario/{id}',[UsuarioController::class,'atualizarUsuario'])->name('atualizar.usuario');
    //rota para eliminar Usuario
    Route::delete('/delete',[UsuarioController::class,'delete'])->name('usuario.delete');
});


