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
    
        $custo_total = ($request->distancia / $request->consumo) * $request->valor_combustivel;
    
        $viagem = ViagemCalculo::create([
            'combustivel' => $request->combustivel,
            'valor_combustivel' => $request->valor_combustivel,
            'distancia' => $request->distancia,
            'consumo' => $request->consumo,
            'custo_total' => $custo_total
        ]);
    
        return view('viagem.resultado', compact('viagem'));
    }
    
}
