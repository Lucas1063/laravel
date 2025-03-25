<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imc extends Model
{
    use HasFactory;

    // Defina os campos que podem ser preenchidos via atribuição em massa
    protected $fillable = [
        'nome',
        'data_nascimento',
        'peso',
        'altura',
        'horas_dormidas',
    ];

    // Accessor para formatar a data de nascimento
    public function setDataNascimentoAttribute($value)
    {
        $this->attributes['data_nascimento'] = Carbon::createFromFormat('Y-m-d', $value);
    }
    public function getDataNascimentoFormatadaAttribute()
    {
        return $this->data_nascimento->format('d/m/Y');
    }

    // Método para calcular o IMC
    public function calcularIMC()
    {
        return $this->peso / ($this->altura * $this->altura);
    }

    // Método para classificar o IMC
    public function classificarIMC()
    {
        $imc = $this->calcularIMC();

        if ($imc < 18.5) {
            return 'Abaixo do peso';
        } elseif ($imc >= 18.5 && $imc < 24.9) {
            return 'Peso normal';
        } elseif ($imc >= 25 && $imc < 29.9) {
            return 'Sobrepeso';
        } else {
            return 'Obesidade';
        }
    }

    // Método para avaliar a qualidade do sono
    public function avaliarQualidadeDoSono()
    {
        if ($this->horas_dormidas >= 7 && $this->horas_dormidas <= 9) {
            return 'Qualidade de sono ideal';
        } elseif ($this->horas_dormidas < 7) {
            return 'Poucas horas de sono';
        } else {
            return 'Muitas horas de sono';
        }
    }
}
