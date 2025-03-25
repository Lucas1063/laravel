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
}
