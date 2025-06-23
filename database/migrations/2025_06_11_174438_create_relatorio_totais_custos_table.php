<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('totais_custo', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('totais_custo_fk_tipo');
            $table->foreign('totais_custo_fk_tipo')->references('id')->on('tipo')->onDelete('cascade');

            $table->unsignedBigInteger('totais_custo_fk_custo');
            $table->foreign('totais_custo_fk_custo')->references('id')->on('custo')->onDelete('cascade');

            // $table->foreignId('totais_custo_fk_tipo')->constrained('tipo');
            // $table->foreignId('totais_custo_fk_custo')->constrained('custo');
            $table->decimal('totais_custo_valor_unitario', 10, 2);
            $table->decimal('totais_custo_quantidade', 10, 2);
        });
    }

    public function down(): void {
        Schema::dropIfExists('totais_custo');
    }
};
