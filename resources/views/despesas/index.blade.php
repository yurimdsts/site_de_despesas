@extends('layouts.appdespesas')

@section('content')
    <h1 class="mb-4">Gerenciamento de Despesas</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botão para cadastrar nova despesa -->
    <a href="{{ route('despesas.create') }}" class="btn btn-primary mb-3">Cadastrar Nova Despesa</a>

    <!-- Tabela de despesas -->
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($despesas as $despesa)
                <tr>
                    <td>{{ $despesa->descricao }}</td>
                    <td>{{ $despesa->tipo }}</td>
                    <td>R$ {{ number_format($despesa->valor, 2, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($despesa->data)->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('despesas.edit', $despesa) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('despesas.destroy', $despesa) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">
                                Excluir
                            </button>
                        </form>
                         
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
