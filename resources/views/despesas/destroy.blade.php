@extends('layouts.app')

@section('content')
    <h1>Excluir Despesa</h1>

    <p>Tem certeza que deseja excluir a despesa abaixo?</p>

    <ul>
        <li><strong>Descrição:</strong> {{ $despesa->descricao }}</li>
        <li><strong>Tipo:</strong> {{ $despesa->tipo }}</li>
        <li><strong>Valor:</strong> R$ {{ number_format($despesa->valor, 2, ',', '.') }}</li>
        <li><strong>Data:</strong> {{ \Carbon\Carbon::parse($despesa->data)->format('d/m/Y') }}</li>
    </ul>

    <form action="{{ route('despesas.destroy', $despesa->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Excluir</button>
        <a href="{{ route('despesas.index') }}">Cancelar</a>
    </form>    
@endsection
