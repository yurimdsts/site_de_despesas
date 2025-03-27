@extends('layouts.appdespesas')

@section('content')
    <h1>Cadastro de Despesas</h1>

    {{-- Exibe mensagem de sucesso --}}
    @if (session('success'))
        <div style="color: green; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Exibe erros de validação --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('despesas.salvar') }}" method="POST">
        @csrf

        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" value="{{ old('descricao') }}" required>
        <br><br>

        <label for="tipo">Tipo:</label>
        <select id="tipo" name="tipo" required>
            <option value="">Selecione</option>
            <option value="Casa" {{ old('tipo') == 'Casa' ? 'selected' : '' }}>Casa</option>
            <option value="Carro" {{ old('tipo') == 'Carro' ? 'selected' : '' }}>Carro</option>
            <option value="Contas" {{ old('tipo') == 'Contas' ? 'selected' : '' }}>Contas</option>
            <option value="Outros" {{ old('tipo') == 'Outros' ? 'selected' : '' }}>Outros</option>
        </select>
        <br><br>

        <label for="valor">Valor:</label>
        <input type="number" step="0.01" id="valor" name="valor" value="{{ old('valor') }}" required>
        <br><br>

        <label for="data">Data:</label>
        <input type="date" id="data" name="data" value="{{ old('data') }}" required>
        <br><br>

        <input type="submit" value="Cadastrar Despesa">
    </form>
    
    <br>
    <a href="{{ route('despesas.listar') }}">Ver Despesas Cadastradas</a>
@endsection
