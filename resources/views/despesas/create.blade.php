@extends('layouts.app')

@section('content')
    <h1>Cadastro de Despesas</h1>

    {{-- Mensagem de sucesso --}}
    @if (session('success'))
        <div style="color: green; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Mensagem de erro --}}
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

        {{-- Campo de Usuário --}}
        <label for="user_id">Usuário:</label>
        <select id="user_id" name="user_id" required>
            <option value="">Selecione</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        <br><br>

        {{-- Campo de Descrição --}}
        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" value="{{ old('descricao') }}" required>
        <br><br>

        {{-- Campo de Tipo --}}
        <label for="tipo">Tipo:</label>
        <select id="tipo" name="tipo" required>
            <option value="">Selecione</option>
            <option value="Casa" {{ old('tipo') == 'Casa' ? 'selected' : '' }}>Casa</option>
            <option value="Carro" {{ old('tipo') == 'Carro' ? 'selected' : '' }}>Carro</option>
            <option value="Contas" {{ old('tipo') == 'Contas' ? 'selected' : '' }}>Contas</option>
            <option value="Outros" {{ old('tipo') == 'Outros' ? 'selected' : '' }}>Outros</option>
        </select>
        <br><br>

        {{-- Campo de Valor --}}
        <label for="valor">Valor:</label>
        <input type="number" step="0.01" id="valor" name="valor" value="{{ old('valor') }}" required>
        <br><br>

        {{-- Campo de Data --}}
        <label for="data">Data:</label>
        <input type="date" id="data" name="data" value="{{ old('data') }}" required>
        <br><br>

        <input type="submit" value="Cadastrar Despesa">
    </form>

    <br>
    <a href="{{ route('despesas.listar') }}">Ver Despesas Cadastradas</a>
@endsection
