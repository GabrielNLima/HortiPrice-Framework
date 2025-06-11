<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('custo_variavel', function (Blueprint $table) {
            $table->id('custovariavel_id');
            $table->foreignId('custovariavel_fk_tipo')->constrained('tipo', 'tipo_id');
            $table->foreignId('custovariavel_fk_produtividade')->constrained('produtividade', 'produtividade_id');
            $table->decimal('custovariavel_precovenda', 10, 2);
            $table->decimal('custovariavel_margem', 5, 2);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('custo_variavel');
    }
};
