<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Site de Despesas')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body >
    <header class="p-3 bg-dark text-white">
        <nav class="container">
            <a href="{{ url('/') }}" class="text-white">Início</a> |
            <a href="{{ route('despesas.index') }}" class="text-white">Cadastrar</a> |
            <a href="{{ route('despesas.listar') }}" class="text-white">Listar Despesas</a>
        </nav>
    </header>

    <main class="container mt-4">
        @yield('content')
    </main>

    <footer class="text-center p-3 bg-light">
        <p>&copy; {{ date('Y') }} - Site de Despesas</p>
    </footer>
</body>
</html>

