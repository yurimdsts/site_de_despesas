@extends('layouts.appuser')

@section('content')
    <h1>Editar Usuário</h1>

    <form action="{{ route('user.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="Name">Nome:</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}" required>
    
        <label for="Email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required>
    
        <button type="submit">Atualizar Usuário</button>
    </form>    
@endsection
