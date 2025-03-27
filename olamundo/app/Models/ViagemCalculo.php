<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViagemCalculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'combustivel', 'valor_combustivel', 'distancia', 'consumo', 'custo_total'
    ];

    // Método para calcular o custo total da viagem
    public function calcularCustoTotal()
    {
        return ($this->distancia > 0 && $this->consumo > 0) 
            ? ($this->distancia / $this->consumo) * $this->valor_combustivel 
            : null;
    }

    // Accessor para retornar o custo total
    public function getCustoTotalAttribute()
    {
        return $this->calcularCustoTotal();
    }
}
