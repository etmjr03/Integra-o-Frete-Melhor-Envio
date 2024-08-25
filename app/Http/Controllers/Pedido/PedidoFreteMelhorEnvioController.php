<?php

namespace App\Http\Controllers\Pedido;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Integracao\IntegracaoMelhorEnvioController;
use App\Models\IntegracaoMelhorEnvio;
use Illuminate\Http\Request;

class PedidoFreteMelhorEnvioController extends Controller
{
    const URI_CRICAO_PEDIDO = 'cart';

    /**
     * @method responsável por criar criar um pedido no carrinho do usuário da Melhor Envio
     * @param object $payload informações que serão usadas para a request de criação de pedido
     * @return object informações do pedido criado no carrinho da Melhor Envio
     */
    public static function executarCriacaoPedidoFrete(Request $request){
        $body     = self::retornarPadraoBodyCriacaoPedido($request->all());
        $response = IntegracaoMelhorEnvioController::executarRequisicao('POST', self::URI_CRICAO_PEDIDO, $body);

        return response()->json($response);
    }

    /**
     * @method responsável por retornar o padrão de body de criação de pedido para o carrinho da Melhor Envio
     * @param array $payload body da requisição de pedido
     * @return array do body de criação de pedido
     */
    public static function retornarPadraoBodyCriacaoPedido($payload){
        return [
            'from' => [
                'name'        => $payload['de']['nome'],
                'phone'       => $payload['de']['celular'],
                'email'       => $payload['de']['email'],
                'document'    => $payload['de']['documento'],
                'address'     => $payload['de']['endereco'],
                'complement'  => $payload['de']['complemento'],
                'number'      => $payload['de']['numero'],
                'district'    => $payload['de']['bairro'],
                'city'        => $payload['de']['cidade'],
                'country_id'  => $payload['de']['sigla_pais'],
                'postal_code' => $payload['de']['cep'],
                'state_abbr'  => $payload['de']['sigla_estado'],
            ],
            'to' => [
                'name'        => $payload['para']['nome'],
                'phone'       => $payload['para']['celular'],
                'email'       => $payload['para']['email'],
                'document'    => $payload['para']['documento'],
                'address'     => $payload['para']['endereco'],
                'complement'  => $payload['para']['complemento'],
                'number'      => $payload['para']['numero'],
                'district'    => $payload['para']['bairro'],
                'city'        => $payload['para']['cidade'],
                'country_id'  => $payload['para']['sigla_pais'],
                'postal_code' => $payload['para']['cep'],
                'state_abbr'  => $payload['para']['sigla_estado'],
            ],
            'options' => [
                'receipt'         => $payload['opcoes']['aviso_recebimento'],
                'own_hand'        => $payload['opcoes']['maos_proprias'],
                'reverse'         => $payload['opcoes']['logistica_reversa'],
                'non_commercial'  => $payload['opcoes']['nao_comercial'],
                'insurance_value' => $payload['opcoes']['valor_seguro'],
            ],
            'service' => $payload['frete_id'],
            'products' => [
                [
                        'name'          => $payload['produto']['nome'],
                        'quantity'      => $payload['produto']['quantidade'],
                        'unitary_value' => $payload['produto']['unitary_value'],
                ]
            ],
            'volumes' => [
                [
                        'height' => $payload['volumes']['altura'],
                        'width'  => $payload['volumes']['largura'],
                        'length' => $payload['volumes']['comprimento'],
                        'weight' => $payload['volumes']['peso'],
                ]
            ]
        ];
    }
}
