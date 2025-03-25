<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Bem-vindo ao Sistema de Cálculos</h1>
    <p>Escolha uma das calculadoras abaixo:</p>
    <a href="{{ route('imc.index') }}" class="btn btn-primary">Calculadora de IMC</a>
    <a href="{{ route('viagem.index') }}" class="btn btn-success">Calculadora de Custo de Viagem</a>
</body>
</html>
