<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Custo de Viagem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Calculadora de Custo de Viagem</h1>
    <form action="{{ route('viagem.calcular') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Combustível:</label>
            <select name="combustivel" class="form-control">
                <option value="Gasolina">Gasolina</option>
                <option value="Álcool">Álcool</option>
                <option value="Diesel">Diesel</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Valor do Combustível (R$):</label>
            <input type="text" name="valor_combustivel" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Distância (km):</label>
            <input type="number" name="distancia" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Consumo do Veículo (km/l):</label>
            <input type="number" name="consumo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Calcular</button>
    </form>
    <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Voltar</a>
</body>
</html>
