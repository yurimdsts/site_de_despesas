@extends('layouts.app')

@section('content')
    <h1>Despesas</h1>

    <form method="GET" action="{{ route('despesas.index') }}">
        <label for="user_id">Filtrar por Usuário:</label>
        <select name="user_id" id="user_id">
            <option value="">Todos</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        <button type="submit">Filtrar</button>
    </form>

    <table border="1" cellpadding="10" class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Data</th>
                <th>Usuário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($despesas as $despesa)
                <tr>
                    <td>{{ $despesa->descricao }}</td>
                    <td>{{ $despesa->tipo }}</td>
                    <td>{{ $despesa->valor }}</td>
                    <td>{{ \Carbon\Carbon::parse($despesa->data)->format('d/m/Y') }}</td>
                    <td>{{ $despesa->user->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('despesas.edit', $despesa->id) }}">Editar</a>
                        <form action="{{ route('despesas.destroy', $despesa->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esta despesa?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Nenhuma despesa encontrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Botão para cadastrar nova despesa, agora posicionado abaixo da tabela -->
    <a href="{{ route('despesas.create') }}" class="btn btn-primary mt-3">Cadastrar Nova Despesa</a>

       <!-- Exibe a soma das despesas -->
       <div class="mt-3">
        <strong>Total de Despesas: </strong> 
        {{ number_format($despesas->sum('valor'), 2, ',', '.') }}
    </div>
@endsection

