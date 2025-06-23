<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustoAbsorcaoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('custoabsorcao')->insert([
            [
                'custoabsorcao_fk_tipo' => 1,          // Certifique-se que tipo com id=1 existe
                'custoabsorcao_fk_produtividade' => 1, // Certifique-se que produtividade com id=1 existe
                'custoabsorcao_precovenda' => 100.50,
                'custoabsorcao_margem' => 12.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'custoabsorcao_fk_tipo' => 2,
                'custoabsorcao_fk_produtividade' => 2,
                'custoabsorcao_precovenda' => 200.00,
                'custoabsorcao_margem' => 10.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Adicione mais entradas conforme necessário
        ]);
    }
}
