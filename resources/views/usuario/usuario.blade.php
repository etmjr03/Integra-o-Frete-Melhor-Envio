@extends('layouts.default')

@section('conteudo')
  <h1>Informações de Usuário - Melhor Envio</h1>
  
  <img src="{{ $informacoesUsuario->picture }}" alt="">
  <p>Nome: {{ $informacoesUsuario->firstname }}</p>
  <p>Sobrenome: {{ $informacoesUsuario->lastname }}</p>
  <p>E-mail: {{ $informacoesUsuario->email }}</p>
  <p>limite de cotação de fretes: {{ $informacoesUsuario->limits->shipments }}</p>
@endsection