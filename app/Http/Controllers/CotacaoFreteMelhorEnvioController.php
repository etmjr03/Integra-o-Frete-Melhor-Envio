<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CotacaoFreteMelhorEnvioController extends Controller
{
    const URI_COTACAO = 'shipment/calculate';

    /**
     * @method Responsável por retornar o padrão de body de cotação de frete
     * @param $payload dados que serão enviados na requisição
     * @return array do body de cotação
     */
    public static function retornarPadraoBodyCotacao($payload = null){
        return [
            'from' => [
                'postal_code' => "96020360"
            ],
            'to' => [
                'postal_code' => '01018020'
            ],
            'products' => [
                [
                'id'              => 'x',
                'width'           => 11,
                'height'          => 17,
                'length'          => 11,
                'weight'          => 0.3,
                'insurance_value' => 10.1,
                'quantity'        => 1
                ]
            ],
            'options' => [
                'receipt'  => false,
                'own_hand' => false
            ],
        ];
    }

    /**
     * @method Responsável por realizar a cotação de frete
     * @return array de fretes disponíveis
     */
    public static function executarCotacaoFrete(){
        $body = self::retornarPadraoBodyCotacao();
        $response = IntegracaoMelhorEnvioController::executarRequisicao('POST', self::URI_COTACAO, $body);
        
        return $response;
    }
}
