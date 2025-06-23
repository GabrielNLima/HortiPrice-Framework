<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelatorioTotaisCustoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('totais_custo')->insert([
            [
                'totais_custo_fk_tipo' => 1,
                'totais_custo_fk_custo' => 1,
                'totais_custo_valor_unitario' => 12.50,
                'totais_custo_quantidade' => 100,
            ],
            [
                'totais_custo_fk_tipo' => 2,
                'totais_custo_fk_custo' => 2,
                'totais_custo_valor_unitario' => 25.00,
                'totais_custo_quantidade' => 50,
            ],
        ]);
    }
}
