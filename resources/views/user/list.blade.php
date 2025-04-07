@extends('layouts.appuser')

@section('content')
    <div class="container">
        <h1>Usuários Cadastrados</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($users->isEmpty())
            <p>Não há usuários cadastrados.</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <!-- Botão Editar agora com a classe btn-success -->
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success btn-sm">Editar</a>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este usuário?')" class="btn btn-danger btn-sm">Excluir</button>
                                    </form>
                                    <a href="{{ route('despesas.index') }}" class="btn btn-primary btn-sm">Visualizar Despesas</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <br>
        <a href="{{ route('user.create') }}" class="btn btn-primary">Cadastrar Novo Usuário</a>
    </div>
@endsection

@section('styles')
    <style>
        .container {
            margin-top: 20px;
        }

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .alert {
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd; /* Adicionando borda à tabela */
        }

        .table th {
            background-color: #f8f9fa;
            text-align: center;
            border: 1px solid #ddd; /* Borda para as células do cabeçalho */
        }

        .table td {
            text-align: center;
            padding: 12px;
            border: 1px solid #ddd; /* Borda para as células */
        }

        .btn {
            margin: 0 5px;
        }

        .btn-sm {
            font-size: 0.875rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .table-responsive {
            overflow-x: auto;
        }
    </style>
@endsection
