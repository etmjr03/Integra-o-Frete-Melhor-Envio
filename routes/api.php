<?php

use App\Http\Controllers\Carrinho\CarrinhoFreteMelhorEnvioController;
use App\Http\Controllers\Cotacao\CotacaoFreteMelhorEnvioController;
use App\Http\Controllers\Pedido\PedidoFreteMelhorEnvioController;
use App\Http\Controllers\Usuario\UsuarioMelhorEnvioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('usuario')->group(function(){
    Route::get('/', [UsuarioMelhorEnvioController::class, 'getInformacoesUsuarioMelhorEnvio'])->name('usuario');
    Route::get('saldo', [UsuarioMelhorEnvioController::class, 'getSaldoCarteiraUsuarioMelhorEnvio'])->name('saldoUsuario');
});

Route::prefix('cotacao')->group(function(){
    Route::post('/', [CotacaoFreteMelhorEnvioController::class, 'executarCotacaoFrete'])->name('cotacaoFrete');
});

Route::prefix('pedido')->group(function(){
    Route::post('/', [PedidoFreteMelhorEnvioController::class, 'executarCriacaoPedidoFrete'])->name('criarPedido');
});

Route::prefix('carrinho')->group(function(){
    Route::get('/', [CarrinhoFreteMelhorEnvioController::class, 'getFretesCarrinho'])->name('listarFretesCarrinho');
    Route::get('/{id}', [CarrinhoFreteMelhorEnvioController::class, 'getFreteEspecificoPorIdCarrinho'])->name('listarFreteEspecificoCarrinho');
    Route::delete('/{id}', [CarrinhoFreteMelhorEnvioController::class, 'deletarFreteEspecificoPorIdCarinho'])->name('deletarFreteEspecificoCarrinho');
});
