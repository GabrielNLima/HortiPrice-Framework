<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('custoabc', function (Blueprint $table) {
            $table->id();
            $table->foreignId('custoabc_fk_tipo')->constrained('tipo', 'id')->cascadeOnDelete();
            $table->foreignId('custoabc_fk_produtividade')->constrained('produtividade', 'id')->cascadeOnDelete();
            $table->decimal('custoabc_precovenda', 10, 2);
            $table->decimal('custoabc_margem', 5, 2);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('custoabc');
    }
};
