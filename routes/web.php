<?php

use App\Http\Controllers\CotacaoFreteMelhorEnvioController;
use App\Http\Controllers\UsuarioMelhorEnvioController;
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

Route::get('/',[UsuarioMelhorEnvioController::class, 'getInformacoesUsuarioMelhorEnvio'] )->name('home');

//PAINEL
Route::prefix('produto')->group(function(){
    Route::get('/detalhe',[CotacaoFreteMelhorEnvioController::class, 'executarCotacaoFrete'] )->name('detalheProduto');

    Route::get('/listagem', function(){
        return view('produto.listagem.produto-listagem');
    })->name('listagemProduto');
});