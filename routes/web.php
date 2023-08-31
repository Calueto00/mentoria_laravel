<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('index');
});

Route::prefix('produtos')->group(function () {
    Route::get('/',[ProdutoController::class,'index'])->name('produto.index');
    Route::delete('/delete',[ProdutoController::class,'delete'])->name('produto.delete');
});
