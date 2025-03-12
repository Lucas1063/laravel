<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImcController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function calcular(Request $request)
{
    $nome = $request->input('nome');
    $data_nascimento = $request->input('data_nascimento');
    $peso = $request->input('peso');
    $altura = $request->input('altura');

    // Cálculo do IMC
    $imc = $peso / ($altura * $altura);

    // Classificação do IMC
    $classificacao = $this->classificarIMC($imc);

    return view('resultado', compact('nome', 'data_nascimento', 'imc', 'classificacao'));
}


    private function classificarIMC($imc)
    {
        if ($imc < 18.5) {
            return 'Abaixo do peso';
        } elseif ($imc < 24.9) {
            return 'Peso normal';
        } elseif ($imc < 29.9) {
            return 'Sobrepeso';
        } elseif ($imc < 34.9) {
            return 'Obesidade Grau I';
        } elseif ($imc < 39.9) {
            return 'Obesidade Grau II';
        } else {
            return 'Obesidade Grau III';
        }
    }
}
