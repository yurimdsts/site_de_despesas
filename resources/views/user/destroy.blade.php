@extends('layouts.app')

@section('content')
    <h1>Excluir Despesa</h1>

    <p>Tem certeza que deseja excluir o usuário abaixo?</p>

    <ul>
        <li><strong>Nome:</strong> {{ $user->name }}</li>
        <li><strong>Email:</strong> {{ $user->email }}</li>
    </ul>

    <form action="{{ route('user.destroy', $userdestroy->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Excluir</button>
        <a href="{{ route('user.index') }}">Cancelar</a>
    </form>
@endsection
