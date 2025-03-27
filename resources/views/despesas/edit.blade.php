@extends('layouts.appdespesas')

@section('content')
    <h1>Editar Despesa</h1>

    <form action="{{ route('despesas.update', $despesa) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" value="{{ $despesa->descricao }}" required>
    
        <label for="tipo">Tipo:</label>
        <select id="tipo" name="tipo" required>
            <option value="Casa" {{ $despesa->tipo == 'Casa' ? 'selected' : '' }}>Casa</option>
            <option value="Carro" {{ $despesa->tipo == 'Carro' ? 'selected' : '' }}>Carro</option>
            <option value="Contas" {{ $despesa->tipo == 'Contas' ? 'selected' : '' }}>Contas</option>
            <option value="Outros" {{ $despesa->tipo == 'Outros' ? 'selected' : '' }}>Outros</option>
        </select>
    
        <label for="valor">Valor:</label>
        <input type="number" step="0.01" id="valor" name="valor" value="{{ $despesa->valor }}" required>
    
        <label for="data">Data:</label>
        <input type="date" id="data" name="data" value="{{ $despesa->data }}" required>
    
        <button type="submit">Atualizar Despesa</button>
    </form>    
@endsection
