@extends('layouts.default')

@section('titlePage', 'Informações de usuário')

@extends('layouts.nav')

@section('conteudo')
  <div class="mt-3 text-light">
    <h4>Informações de Usuário - Melhor Envio</h4>
    
    <img src="{{ $informacoesUsuario->picture }}" alt="" style="width: 200px; height: 200px; border-radius: 50%;">
    <p>Nome: {{ $informacoesUsuario->firstname }} {{ $informacoesUsuario->lastname }}</p>
    <p>E-mail: {{ $informacoesUsuario->email }}</p>
    <p>limite de cotação de fretes: {{ $informacoesUsuario->limits->shipments }}</p>
  </div>
@endsection

@extends('layouts.footer')