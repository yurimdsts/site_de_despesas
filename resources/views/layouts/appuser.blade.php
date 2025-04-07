<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Site de Despesas')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Definir o layout do body para flex */
        html, body {
            height: 100%; /* Garante que o body ocupe 100% da altura da tela */
            margin: 0;
            display: flex;
            flex-direction: column;
            background-color: #343a40; /* Cor do fundo do body */
            color: #f8f9fa; /* Cor do texto */
        }

        main {
            flex: 1; /* Faz com que o conteúdo ocupe o espaço restante */
        }

        footer {
            background-color: #343a40; /* Cor escura para o footer */
            color: #f8f9fa; /* Cor do texto no footer */
            padding: 10px;
            text-align: center;
        }

        header {
            background-color: #212529; /* Cor escura para o cabeçalho */
            padding: 10px;
        }

        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header class="p-3 text-white">
        <nav class="container">
            <a href="{{ url('/') }}" class="text-white">Início</a> |
            <a href="{{ route('user.index') }}" class="text-white">Cadastrar</a> |
            <a href="{{ route('user.list') }}" class="text-white">Listar Usuários</a>
        </nav>
    </header>

    <main class="container mt-4">
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} - Site de Despesas</p>
    </footer>
</body>
</html>
