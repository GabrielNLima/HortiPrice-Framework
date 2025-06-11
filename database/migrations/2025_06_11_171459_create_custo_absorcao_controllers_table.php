<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('custoabsorcao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('custoabsorcao_fk_tipo')->constrained('tipos')->onDelete('cascade');
            $table->foreignId('custoabsorcao_fk_produtividade')->constrained('produtividade')->onDelete('cascade');
            $table->decimal('custoabsorcao_precovenda', 10, 2);
            $table->decimal('custoabsorcao_margem', 5, 2);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('custoabsorcao');
    }
};
