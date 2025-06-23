<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('produtividade', function (Blueprint $table) {
            $table->id();
            $table->decimal('produtividade_valor', 10, 2);
            $table->unsignedBigInteger('produtividade_fk_unidade');
            $table->string('produtividade_mes', 2);
            $table->string('produtividade_ano', 4);
            $table->unsignedBigInteger('produtividade_fk_tipo');
            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('produtividade_fk_unidade')->references('id')->on('unidade')->onDelete('cascade');
            $table->foreign('produtividade_fk_tipo')->references('id')->on('tipo')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtividade');
    }
};
