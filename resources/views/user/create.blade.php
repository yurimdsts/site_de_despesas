@extends('layouts.app')

@section('content')
    <h1>Cadastro de Usuário</h1>

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

    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required aria-describedby="nameHelp">
        <small id="nameHelp">Digite seu nome completo.</small>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required aria-describedby="emailHelp">
        <small id="emailHelp">Digite um e-mail válido.</small>
        <br><br>
        
        <button type="submit">Cadastrar Usuário</button>
    </form>
    
    <br>
    <a href="{{ route('user.list') }}">Ver Usuários Cadastrados</a>
@endsection
