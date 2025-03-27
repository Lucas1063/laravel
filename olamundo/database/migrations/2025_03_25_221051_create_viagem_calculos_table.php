<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('viagem_calculos', function (Blueprint $table) {
            $table->id();
            $table->string('combustivel');
            $table->decimal('valor_combustivel', 8, 2);
            $table->integer('distancia');
            $table->integer('consumo');
            $table->decimal('custo_total', 8, 2)->nullable(); // Permite valores nulos
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('viagem_calculos');
    }
};
