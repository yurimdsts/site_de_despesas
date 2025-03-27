@extends('layouts.appdespesas')

@section('content')
    <h1>Bem-vindo ao Site de Despesas</h1>
    <p>Gerencie suas despesas de forma simples e eficiente.</p>

    <ul>
        <li><a href="{{ route('despesas.index') }}">Cadastrar Nova Despesa</a></li>
        <li><a href="{{ route('despesas.listar') }}">Ver Despesas Cadastradas</a></li>
    </ul>
@endsection
