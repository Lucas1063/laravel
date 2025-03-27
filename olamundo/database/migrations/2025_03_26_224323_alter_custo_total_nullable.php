<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('viagem_calculos', function (Blueprint $table) {
            $table->decimal('custo_total', 8, 2)->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('viagem_calculos', function (Blueprint $table) {
            $table->decimal('custo_total', 8, 2)->nullable(false)->change();
        });
    }
};
