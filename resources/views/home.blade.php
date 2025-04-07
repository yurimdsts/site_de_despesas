<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
            background-color: #343a40; /* Cor de fundo mais escura */
            color: #ecf0f1; /* Cor do texto mais clara */
        }
        h1 {
            color: #ecf0f1; /* Cor do título clara */
        }
        .buttons-container {
            margin-top: 20px;
        }
        a, button {
            padding: 10px;
            margin: 5px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #007bff; /* Cor de fundo azul para os botões */
            color: #fff;
            text-decoration: none;
            cursor: pointer;
        }
        a:hover, button:hover {
            background-color: #0056b3; /* Cor de fundo azul escuro ao passar o mouse */
        }
        button {
            border: none;
        }
    </style>
</head>
<body>
    <h1>Bem-vindo ao Site de Gerenciamento de Despesas</h1>
    
    <div class="buttons-container">
        <a href="/user">Usuários</a>
        <a href="/despesas">Despesas</a>
    </div>
</body>
</html>
