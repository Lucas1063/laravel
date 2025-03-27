<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViagemCalculo;

class ViagemController extends Controller
{
    public function index()
    {
        return view('viagem.index'); 
    }
    
    public function calcular(Request $request)
    {
        $request->validate([
            'combustivel' => 'required',
            'valor_combustivel' => 'required|numeric',
            'distancia' => 'required|numeric',
            'consumo' => 'required|numeric',
        ]);

        // Criar o objeto sem definir custo_total manualmente
        $viagem = ViagemCalculo::create([
            'combustivel' => $request->combustivel,
            'valor_combustivel' => $request->valor_combustivel,
            'distancia' => $request->distancia,
            'consumo' => $request->consumo
        ]);

        return view('viagem.resultado', compact('viagem'));
    }
}
