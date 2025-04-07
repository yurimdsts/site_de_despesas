@extends('layouts.app')

@section('content')
    <h1>Detalhes da Despesa</h1>

    <p><strong>Descrição:</strong> {{ $despesa->descricao }}</p>
    <p><strong>Tipo:</strong> {{ $despesa->tipo }}</p>
    <p><strong>Valor:</strong> R$ {{ number_format($despesa->valor, 2, ',', '.') }}</p>
    <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($despesa->data)->format('d/m/Y') }}</p>

    <br>
    <a href="{{ route('despesas.index') }}">Voltar para a lista de despesas</a>
@endsection
