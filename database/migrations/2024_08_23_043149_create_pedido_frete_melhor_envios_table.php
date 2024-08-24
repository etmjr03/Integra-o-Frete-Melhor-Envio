<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_frete_melhor_envios', function (Blueprint $table) {
            $table->id();
            $table->string('id_produto');
            $table->string('nome_produto');
            $table->string('valor_produto');
            $table->string('height');
            $table->string('width');
            $table->string('length');
            $table->string('weight');
            $table->string('quantidade');
            $table->string('insurance_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_frete_melhor_envios');
    }
};
