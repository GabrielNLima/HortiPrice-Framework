<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('componente', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('componente_fk_tipo');
            $table->foreign('componente_fk_tipo')->references('id')->on('tipo')->onDelete('cascade');
            
            $table->unsignedBigInteger('componente_fk_unidade');
            $table->foreign('componente_fk_unidade')->references('id')->on('unidade')->onDelete('cascade');
            
            $table->unsignedBigInteger('componente_fk_custo');
            $table->foreign('componente_fk_custo')->references('id')->on('custo')->onDelete('cascade');

            $table->string('componente_descricao');
            $table->integer('componente_quantidade');
            $table->float('componente_valor_unitario');
            $table->string('componente_mes', 255);
            $table->integer('componente_ano');
            $table->boolean('ativo')->default(true);

            $table->unsignedTinyInteger('classificacao')->default(1); // Exemplo: valor padrão = 1 (CUSTO_INDIRETO)

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('componente');
    }
};
