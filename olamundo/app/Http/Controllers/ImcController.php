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
        $horas_dormidas = $request->input('horas_dormidas');

        // Cálculo do IMC
        $imc = $peso / ($altura * $altura);

        // Classificação do IMC
        $classificacao = $this->classificarIMC($imc);

        // Cálculo da qualidade do sono com base na idade
        $idade = $this->calcularIdade($data_nascimento);
        $qualidade_do_sono = $this->avaliarQualidadeDoSono($horas_dormidas, $idade);

        return view('resultado', compact('nome', 'data_nascimento', 'imc', 'classificacao', 'qualidade_do_sono'));
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

    private function calcularIdade($data_nascimento)
    {
        $data_nascimento = \Carbon\Carbon::parse($data_nascimento);
        return \Carbon\Carbon::now()->diffInYears($data_nascimento);
    }

    private function avaliarQualidadeDoSono($horas_dormidas, $idade)
    {
        // Baseado na idade, definir a quantidade de horas recomendadas de sono
        $horas_recomendadas = 0;

        if ($idade >= 18 && $idade <= 64) {
            $horas_recomendadas = 7; // Adultos
        } elseif ($idade >= 65) {
            $horas_recomendadas = 7; // Idosos
        } elseif ($idade >= 6 && $idade <= 17) {
            $horas_recomendadas = 8; // Adolescentes
        } elseif ($idade >= 3 && $idade <= 5) {
            $horas_recomendadas = 10; // Crianças pequenas
        } else {
            $horas_recomendadas = 12; // Bebês
        }

        // Avaliar a qualidade do sono
        if ($horas_dormidas < $horas_recomendadas) {
            return 'Sono insatisfatório';
        } elseif ($horas_dormidas == $horas_recomendadas) {
            return 'Sono adequado';
        } else {
            return 'Sono excessivo';
        }
    }
}
