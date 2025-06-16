<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('relatorio_abc', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_id');
            $table->foreign('tipo_id')->references('tipo_id')->on('tipo');
            $table->decimal('custo_atividade', 10, 2);
            $table->string('custo_descricao');
            $table->string('direcionador_descricao');
            $table->decimal('atividade_direcionador_quantidade', 10, 2);
            $table->decimal('custo_direcionador', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relatorio_abc');
    }
};
