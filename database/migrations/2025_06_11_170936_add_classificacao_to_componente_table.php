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
    Schema::table('componente', function (Blueprint $table) {
        $table->unsignedTinyInteger('classificacao')->default(1); // 1 = Custo Indireto
    });
}

public function down(): void
{
    Schema::table('componente', function (Blueprint $table) {
        $table->dropColumn('classificacao');
    });
}

};
