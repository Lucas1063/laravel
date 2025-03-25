<?php

use App\Http\Controllers\ImcController;
use App\Http\Controllers\ViagemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Rotas para o IMC
Route::prefix('imc')->group(function () {
    Route::get('/', [ImcController::class, 'index'])->name('imc.index');
    Route::post('/calcular', [ImcController::class, 'calcular'])->name('imc.calcular');
});

// Rotas para Viagem (se aplicável)
Route::get('/viagem', [ViagemController::class, 'index'])->name('viagem.index');
Route::post('/viagem/calcular', [ViagemController::class, 'calcular'])->name('viagem.calcular');