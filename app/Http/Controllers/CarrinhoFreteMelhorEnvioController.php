<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoFreteMelhorEnvioController extends Controller
{
    const URI_CARRINHO = 'cart';

    /**
     * @method responsável por retornar a listagem de fretes do carrinho do usuário na Melhor Envio
     * @return array dos fretes que estão no carrinho
     */
    public static function getFretesCarrinho(){
        $response = IntegracaoMelhorEnvioController::executarRequisicao('GET', self::URI_CARRINHO);

        return response()->json($response);
    }

    /**
     * @method responsável por retornar as informações de um frete específico do carrinho Melhor Envio
     * @param object $request com o id do frete no carrinho da Melhor Envio
     * @return object das informações do frete do carrinho
     */
    public static function getFreteEspecificoPorIdCarrinho(Request $request){
        $response = IntegracaoMelhorEnvioController::executarRequisicao('GET', self::URI_CARRINHO.'/'.$request->id);

        return response()->json($response);
    }

    /**
     * @method responsável por remover um frete do carrinho do usuário na Melhor Envio
     * @param object $request id do frete no carrinho da Melhor Envio
     * @return object mensagem de erro ou sucesso
     */
    public static function deletarFreteEspecificoPorIdCarinho(Request $request){
        $response = IntegracaoMelhorEnvioController::executarRequisicao('DELETE', self::URI_CARRINHO.'/'.$request->id);
        isset($response->message) ? $retorno = $response->message : $retorno = ['messagem' => 'Frete removido do carrinho.'];
        
        return response()->json($retorno);
    }
}
