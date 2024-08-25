<?php

namespace App\Http\Controllers\Cotacao;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Integracao\IntegracaoMelhorEnvioController;
use Illuminate\Http\Request;

class CotacaoFreteMelhorEnvioController extends Controller
{
    const URI_COTACAO = 'shipment/calculate';

    /**
     * @method Responsável por realizar a cotação de frete
     * @param object $request body da requisição
     * @return array de fretes disponíveis
     */
    public static function executarCotacaoFrete(Request $request){
        $body = self::retornarPadraoBodyCotacao($request->all());
        $response = IntegracaoMelhorEnvioController::executarRequisicao('POST', self::URI_COTACAO, $body);
        
        return response()->json($response);
    }

    /**
     * @method Responsável por retornar o padrão de body de cotação de frete
     * @param array $payload de dados que serão enviados na requisição
     * @return array do body de cotação
     */
    public static function retornarPadraoBodyCotacao($payload){
        return [
            'from' => [
                'postal_code' => $payload['cep_remetente']
            ],
            'to' => [
                'postal_code' => $payload['cep_destinatario']
            ],
            'products' => [
                [
                'id'              => $payload['produto']['id'],
                'width'           => $payload['produto']['largura'],
                'height'          => $payload['produto']['altura'],
                'length'          => $payload['produto']['comprimento'],
                'weight'          => $payload['produto']['peso'],
                'insurance_value' => $payload['produto']['valor_seguro'],
                'quantity'        => $payload['produto']['quantidade'],
                ]
            ],
            'options' => [
                'receipt'  => $payload['opcoes']['aviso_recebimento'],
                'own_hand' => $payload['opcoes']['maos_proprias'],
            ],
        ];
    }
}
