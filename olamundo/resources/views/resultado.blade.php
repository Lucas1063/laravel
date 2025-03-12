<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do IMC</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Resultado do IMC</h1>
    <p><strong>Nome:</strong> {{ $nome ?? 'Nome não fornecido' }}</p>
    <p><strong>Data de Nascimento:</strong> {{ $data_nascimento ?? 'Data de nascimento não fornecida' }}</p>
    <p><strong>Seu IMC é:</strong> {{ isset($imc) ? number_format($imc, 2, ',', '.') : 'Erro: IMC não calculado' }}</p>
    <p><strong>Classificação:</strong> {{ $classificacao ?? 'Erro: Classificação não definida' }}</p>
    <a href="/" class="btn btn-secondary">Voltar</a>
</body>
</html>
