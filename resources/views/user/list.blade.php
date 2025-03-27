@extends('layouts.appuser')

@section('content')
    <h1>Usuários Cadastrados</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($users->isEmpty())
        <p>Não há usuários cadastrados.</p>
    @else
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('user.edit', $user->id) }}">Editar</a> |
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <br>
    <a href="{{ route('user.create') }}">Cadastrar Novo Usúario</a>
@endsection
