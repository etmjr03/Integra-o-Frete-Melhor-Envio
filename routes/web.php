<?php

use App\Http\Controllers\CotacaoFreteMelhorEnvioController;
use App\Http\Controllers\UsuarioMelhorEnvioController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UsuarioMelhorEnvioController::class, 'getInformacoesUsuarioMelhorEnvio'] )->name('home');

Route::prefix('produto')->group(function(){
    Route::get('/detalhe',[CotacaoFreteMelhorEnvioController::class, 'executarCotacaoFrete'] )->name('detalheProduto');

    Route::get('/listagem', function(){
        return view('produto.listagem.produto-listagem');
    })->name('listagemProduto');
});