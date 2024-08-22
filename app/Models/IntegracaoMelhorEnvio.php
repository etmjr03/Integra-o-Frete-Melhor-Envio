<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntegracaoMelhorEnvio extends Model
{
    use HasFactory;

    /**
     * @method responsável por retornar as informações da tabela de integração da Melhor Envio
     * @return array de todas as informações da integração
     */
    public static function getInformacoesMelhorEnvio(){
        $obInformacoesMelhorEnvio = parent::find(1);
        
        return $obInformacoesMelhorEnvio;
    }
}
