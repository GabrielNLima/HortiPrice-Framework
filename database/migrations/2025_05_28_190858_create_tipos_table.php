<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tipo', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_descricao', 255)->notNullable();

            $table->unsignedBigInteger('tipo_fk_area')->notNullable();
            $table->unsignedBigInteger('tipo_fk_categoria')->notNullable();
            $table->unsignedBigInteger('tipo_fk_subcategoria')->notNullable();
            
            $table->timestamps();
            
            $table->foreign('tipo_fk_area')
                  ->references('id')
                  ->on('area')
                  ->onDelete('cascade');
                  
            $table->foreign('tipo_fk_categoria')
                  ->references('id')
                  ->on('categoria')
                  ->onDelete('cascade');
                  
            $table->foreign('tipo_fk_subcategoria')
                  ->references('id')
                  ->on('sub_categoria')
                  ->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo');
    }
};
