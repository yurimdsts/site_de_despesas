@extends('layouts.appdespesas')

@section('content')
    <h1>Despesas Cadastradas</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($despesas->isEmpty())
        <p>Não há despesas cadastradas.</p>
    @else
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Tipo</th>
                    <th>Valor (R$)</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($despesas as $despesa)
                    <tr>
                        <td>{{ $despesa->descricao }}</td>
                        <td>{{ $despesa->tipo }}</td>
                        <td>{{ number_format($despesa->valor, 2, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($despesa->data)->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('despesas.edit', $despesa->id) }}">Editar</a> |
                            <form action="{{ route('despesas.destroy', $despesa->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esta despesa?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <br>
    <a href="{{ route('despesas.index') }}">Cadastrar Nova Despesa</a>
@endsection
