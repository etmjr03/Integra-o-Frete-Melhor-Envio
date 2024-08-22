<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login.login');
});

//PAINEL
Route::prefix('produto')->group(function(){
    Route::get('/listagem', function(){
        return view('produto.listagem.produto-listagem');
    })->name('listagem');

    Route::get('detalhe', function(){
        return view('produto.detalhe.produto-detalhe');
    })->name('detalheProduto');
});