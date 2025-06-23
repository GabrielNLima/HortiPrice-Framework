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

            $table->unsignedBigInteger('atividade_fk_unidade');

            $table->unsignedBigInteger('atividade_fk_custo');
            $table->foreign('atividade_fk_custo')->references('id')->on('custo')->onDelete('cascade');

            $table->foreignId('atividade_fk_direcionador')->constrained('direcionador');
            $table->decimal('atividade_direcionador_quantidade', 10, 2);

            $table->foreign('atividade_fk_unidade')->references('id')->on('unidade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('atividade');
    }
};
