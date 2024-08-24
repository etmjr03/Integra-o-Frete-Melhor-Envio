<?php

namespace App\Http\Controllers;

use App\Models\IntegracaoMelhorEnvio;
use Illuminate\Http\Request;

class PedidoFreteMelhorEnvioController extends Controller
{
    const URI_CRICAO_PEDIDO = 'cart';

    /**
     * @method responsável por retornar o padrão de body de criação de pedido para o carrinho da Melhor Envio
     * @return array do body de criação de pedido
     */
    public static function retornarPadraoBodyCriacaoPedido(){
        return [
            'from' => [
                'name'        => 'remetente',
                'phone'       => '35991111111',
                'email'       => 'remetente@gmail.com',
                'document'    => '59531055092',
                'address'     => 'rua remetente',
                'complement'  => 'casa',
                'number'      => '10',
                'district'    => 'Centro',
                'city'        => 'São Paulo',
                'country_id'  => 'BR',
                'postal_code' => '01002-020',
                'state_abbr'  => 'sp'
            ],
            'to' => [
                'name'        => 'destinatário',
                'phone'       => '35991111111',
                'email'       => 'destinatário@gmail.com',
                'document'    => '49942814086',
                'address'     => 'rua destinatário',
                'complement'  => 'casa',
                'number'      => '20',
                'district'    => 'centro',
                'city'        => 'São Paulo',
                'country_id'  => 'BR',
                'postal_code' => '01002-020',
                'state_abbr'  => 'mg'
            ],
            'options' => [
                'receipt'         => true,
                'own_hand'        => true,
                'reverse'         => false,
                'non_commercial'  => true,
                'insurance_value' => 10
            ],
            'service' => 2,
            'products' => [
                [
                        'name'          => 'produto',
                        'quantity'      => '1',
                        'unitary_value' => '10'
                ]
            ],
            'volumes' => [
                [
                        'height' => 5,
                        'width'  => 10,
                        'length' => 20,
                        'weight' => 0.3
                ]
            ]
        ];
    }

    /**
     * @method responsável por criar criar um pedido no carrinho do usuário da Melhor Envio
     * @param $payload informações que serão usadas para a request de criação de pedido
     */
    public static function executarCriacaoPedidoFrete($payload = null){
        $body     = self::retornarPadraoBodyCriacaoPedido();
        $response = IntegracaoMelhorEnvioController::executarRequisicao('POST', self::URI_CRICAO_PEDIDO, $body);

        return $response;
    }
}
