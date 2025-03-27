<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imc;

class ImcController extends Controller
{
    public function index()
    {
        return view('imc.index');
    }

    public function calcular(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string',
            'data_nascimento' => 'required|date',
            'peso' => 'required|numeric|min:1',
            'altura' => 'required|numeric|min:0.5',
            'horas_dormidas' => 'required|numeric|min:0|max:24',
        ]);

    
        $imc = new Imc($dados);

        // Retorna a view 'resultado' com os dados do IMC
        return view('imc.resultado', [
            'nome' => $imc->nome,
            'data_nascimento' => $imc->data_nascimento->format('d/m/Y'),
            'imc' => number_format($imc->calcularIMC(), 2),
            'classificacao' => $imc->classificarIMC(),
            'qualidade_do_sono' => $imc->avaliarQualidadeDoSono(),
        ]);
    }
}
