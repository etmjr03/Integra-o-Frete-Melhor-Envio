<?php

namespace App\Http\Controllers;

use App\Models\IntegracaoMelhorEnvio;
use Illuminate\Http\Request;

class UsuarioMelhorEnvioController extends Controller
{
    /**
     * @method responsável por retornar as informações do usuário
     * @return array com as informações de usuário da Melhor Envio
     */
    public static function getInformacoesUsuarioMelhorEnvio(){
        $responseInformacoesUsuario['informacoesUsuario'] = IntegracaoMelhorEnvioController::executarRequisicao('GET');

        //return $responseInformacoesUsuario;
        return view('usuario.usuario', $responseInformacoesUsuario);
    }
}
