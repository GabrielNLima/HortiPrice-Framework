<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('custoabsorcao', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('custoabsorcao_fk_tipo'); 
            $table->foreign('custoabsorcao_fk_tipo')->references('id')->on('tipo')->onDelete('cascade');
           
            $table->unsignedBigInteger('custoabsorcao_fk_produtividade');            
            $table->foreign('custoabsorcao_fk_produtividade')->references('id')->on('produtividade')->onDelete('cascade');
            
            $table->decimal('custoabsorcao_precovenda', 10, 2);
            $table->decimal('custoabsorcao_margem', 5, 2);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('custoabsorcao');
    }
};
