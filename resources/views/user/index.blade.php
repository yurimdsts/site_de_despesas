@extends('layouts.appuser')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Lista de Usuários</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white p-2 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Nome</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="border p-2">{{ $user->name }}</td>
                        <td class="border p-2">{{ $user->email }}</td>
                        <td class="border p-2">
                            <a href="{{ route('user.edit', $user->id) }}" class="text-blue-500">Editar</a> |
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Tem certeza?')" class="text-red-500">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br>
        <a href="{{ route('user.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Cadastrar Novo Usuário</a>
    </div>
@endsection
