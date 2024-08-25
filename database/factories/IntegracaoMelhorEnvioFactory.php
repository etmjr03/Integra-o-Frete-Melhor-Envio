<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IntegracaoMelhorEnvio>
 */
class IntegracaoMelhorEnvioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'hash'     => 'dados-integracao',
            'endpoint' => 'https://sandbox.melhorenvio.com.br/api/v2/me/',
            'token'    => 'seu token aqui',
            'email'    => 'seuemail@gmail.com'
        ];
    }
}
