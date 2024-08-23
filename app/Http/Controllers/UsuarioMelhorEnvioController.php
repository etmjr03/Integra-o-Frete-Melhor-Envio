<?php

namespace App\Http\Controllers;

use App\Models\IntegracaoMelhorEnvio;
use Illuminate\Http\Request;

class UsuarioMelhorEnvioController extends Controller
{
    const URI_SALDO = 'balance';

    /**
     * @method responsável por retornar as informações do usuário
     * @return array com as informações de usuário da Melhor Envio
     */
    public static function getInformacoesUsuarioMelhorEnvio(){
        $response['informacoesUsuario']      = IntegracaoMelhorEnvioController::executarRequisicao('GET');
        $response['informacoesSaldoUsuario'] = self::getSaldoCarteiraUsuarioMelhorEnvio();

        return view('usuario.usuario', $response);
    }

    /**
     * @method responsável por retornar o saldo disponível na carteira do usuário
     * @return object informações sobre o saldo do usuário
     */
    public static function getSaldoCarteiraUsuarioMelhorEnvio(){
        $response = IntegracaoMelhorEnvioController::executarRequisicao('GET', self::URI_SALDO);

        return $response;
    }
}
