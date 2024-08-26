<?php

use App\Http\Controllers\CotacaoFreteMelhorEnvioController;
use App\Http\Controllers\UsuarioMelhorEnvioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
})->name('home');