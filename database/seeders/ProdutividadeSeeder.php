<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutividadeSeeder extends Seeder
{
    public function run()
    {
        // Exemplo de inserção de dados
        DB::table('produtividade')->insert([
            [
                'produtividade_valor' => 100.50,
                'produtividade_fk_unidade' => 1,  // Certifique-se que exista unidade com id 1
                'produtividade_mes' => '06',
                'produtividade_ano' => '2025',
                'produtividade_fk_tipo' => 1,    // Certifique-se que exista tipo com id 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produtividade_valor' => 200.75,
                'produtividade_fk_unidade' => 2,
                'produtividade_mes' => '07',
                'produtividade_ano' => '2025',
                'produtividade_fk_tipo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
