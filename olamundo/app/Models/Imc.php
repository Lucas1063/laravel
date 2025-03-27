<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imc extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'data_nascimento',
        'peso',
        'altura',
        'horas_dormidas',
    ];

    public function setDataNascimentoAttribute($value)
    {
        $this->attributes['data_nascimento'] = Carbon::createFromFormat('Y-m-d', $value);
    }

    public function getDataNascimentoFormatadaAttribute()
    {
        return $this->data_nascimento->format('d/m/Y');
    }

    public function calcularIMC()
    {
        return $this->peso / ($this->altura * $this->altura);
    }

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

    public function getIdadeAttribute()
    {
        return $this->data_nascimento->age;
    }

    public function avaliarQualidadeDoSono()
    {
        $idade = $this->idade;
        $horas = $this->horas_dormidas;

        $faixas = [
            [0, 10, 10, 20],   // Crianças de 0 a 10 anos
            [11, 19, 10, 20],  // Jovens de 10 a 20 anos
            [20, 64, 7, 9],    // Adultos de 20 a 65 anos
            [65, 150, 7, 8],   // Idosos a partir de 65 anos
        ];

        foreach ($faixas as [$min, $max, $minHoras, $maxHoras]) {
            if ($idade >= $min && $idade <= $max) {
                if ($horas < $minHoras) {
                    return 'Poucas horas de sono';
                } elseif ($horas > $maxHoras) {
                    return 'Muitas horas de sono';
                } else {
                    return 'Qualidade de sono ideal';
                }
            }
        }

        return 'Faixa etária não encontrada';
    }
}
