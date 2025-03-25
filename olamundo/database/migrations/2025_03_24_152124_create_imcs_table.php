<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('imcs', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('data_nascimento');
            $table->decimal('peso', 5, 2);
            $table->decimal('altura', 3, 2);
            $table->decimal('imc', 5, 2);
            $table->string('classificacao');
            $table->integer('horas_dormidas');
            $table->string('qualidade_do_sono');
            $table->timestamps(); //
        });
    }

    public function down() {
        Schema::dropIfExists('imcs');
    }
};
