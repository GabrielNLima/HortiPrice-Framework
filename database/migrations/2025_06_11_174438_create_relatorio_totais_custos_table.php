<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('componente', function (Blueprint $table) {
            $table->id();
            $table->foreignId('componente_fk_tipo')->constrained('tipo');
            $table->foreignId('componente_fk_custo')->constrained('custo');
            $table->decimal('componente_valor_unitario', 10, 2);
            $table->decimal('componente_quantidade', 10, 2);
        });
    }

    public function down(): void {
        Schema::dropIfExists('componente');
    }
};
