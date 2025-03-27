<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do IMC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Resultado do IMC</h1>
    
    @if(isset($nome) && isset($imc))
    <div class="card">
        <div class="card-body">
            <p><strong>Nome:</strong> {{ $nome }}</p>
            <p><strong>Data de Nascimento:</strong> {{ $data_nascimento }}</p>
            <p><strong>Seu IMC é:</strong> {{ $imc }}</p>
            <p><strong>Classificação:</strong> {{ $classificacao }}</p>
            <p><strong>Qualidade do Sono:</strong> {{ $qualidade_do_sono }}</p>
        </div>
    </div>
    @else
    <div class="alert alert-danger">
        Ocorreu um erro ao calcular o IMC. Por favor, tente novamente.
    </div>
    @endif

    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Voltar</a>
</body>
</html>