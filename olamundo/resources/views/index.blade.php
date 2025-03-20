<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="container mt-5">
    <h2>Calculadora de IMC</h2>
    <form action="{{ route('calcular.imc') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" required placeholder="Digite seu nome">
        </div>
        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
            <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="peso" class="form-label">Peso (kg):</label>
            <input type="number" name="peso" id="peso" class="form-control" step="0.01" required placeholder="Exemplo: 70">
        </div>
        <div class="mb-3">
            <label for="altura" class="form-label">Altura (m):</label>
            <input type="number" name="altura" id="altura" class="form-control" step="0.01" required placeholder="Exemplo: 1.75">
        </div>
        <div class="mb-3">
            <label for="horas_dormidas" class="form-label">Número médio de horas dormidas:</label>
            <input type="number" name="horas_dormidas" id="horas_dormidas" class="form-control" required placeholder="Exemplo: 8">
        </div>
        <button type="submit" class="btn btn-primary">Calcular</button>
    </form>
</body>
</html>
