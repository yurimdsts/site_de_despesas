@extends('layouts.appdespesas')

@section('content')
    <h1>Resultado do Cálculo</h1>

    <p><strong>Saldo disponível:</strong> R$ {{ number_format($diferenca, 2, ',', '.') }}</p>

    @if($diferenca >= 0)
        <p style="color: green;">Você ainda tem dinheiro disponível!</p>
    @else
        <p style="color: red;">Cuidado! Suas despesas ultrapassam seu salário.</p>
    @endif

    <br>
    <a href="{{ route('despesas.index') }}">Voltar para Cadastro de Despesas</a>
@endsection
