<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Cálculo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Resultado do Cálculo</h1>
    <p><strong>Combustível:</strong> {{ $viagem->combustivel }}</p>
    <p><strong>Valor do Combustível:</strong> R$ {{ number_format($viagem->valor_combustivel, 2, ',', '.') }}</p>
    <p><strong>Distância:</strong> {{ $viagem->distancia }} km</p>
    <p><strong>Consumo:</strong> {{ $viagem->consumo }} km/l</p>
    <p><strong>Custo Total:</strong> R$ {{ number_format($viagem->custo_total, 2, ',', '.') }}</p>
    <a href="{{ route('viagem.index') }}" class="btn btn-secondary">Calcular Novamente</a>
    <a href="{{ route('home') }}" class="btn btn-primary">Voltar ao Início</a>
</body>
</html>
