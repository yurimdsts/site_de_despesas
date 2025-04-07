@extends('layouts.appuser')

@section('content')
    <h1>Excluir Usuário</h1>

    <p>Tem certeza que deseja excluir o usuário abaixo?</p>

    <ul>
        <li><strong>Nome:</strong> {{ $user->name }}</li>
        <li><strong>Email:</strong> {{ $user->email }}</li>
    </ul>

    <form action="{{ route('user.destroy', $user->id) }}" method="POST">  <!-- Corrigido -->
        @csrf
        @method('DELETE')
        <button type="submit">Excluir</button>
        <a href="{{ route('user.index') }}">Cancelar</a>
    </form>
@endsection
