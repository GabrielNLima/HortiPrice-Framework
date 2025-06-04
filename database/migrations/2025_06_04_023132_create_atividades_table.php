<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('atividade', function (Blueprint $table) {
            $table->id();
            $table->string('atividade_descricao');
            $table->foreignId('atividade_fk_custo')->constrained('custo');
            $table->foreignId('atividade_fk_direcionador')->constrained('direcionador');
            $table->decimal('atividade_direcionador_quantidade', 10, 2);
            $table->foreignId('atividade_fk_unidade')->constrained('unidade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('atividade');
    }
};
