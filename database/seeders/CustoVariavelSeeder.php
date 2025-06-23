<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustoVariavelSeeder extends Seeder
{
    public function run(): void
    {
        // Exemplo de dados: você pode ajustar conforme os IDs existentes nas tabelas relacionadas
        DB::table('custo_variavel')->insert([
            [
                'custovariavel_fk_tipo' => 1,
                'custovariavel_fk_produtividade' => 1,
                'custovariavel_precovenda' => 150.00,
                'custovariavel_margem' => 20.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'custovariavel_fk_tipo' => 2,
                'custovariavel_fk_produtividade' => 2,
                'custovariavel_precovenda' => 230.50,
                'custovariavel_margem' => 15.75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
