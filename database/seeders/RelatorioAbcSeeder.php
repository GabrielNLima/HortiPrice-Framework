<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelatorioAbcSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('relatorio_abc')->insert([
            [
                'tipo_id' => 1,
                'custo_atividade' => 1500.75,
                'custo_descricao' => 'Custo de atividade A',
                'direcionador_descricao' => 'Horas Máquina',
                'atividade_direcionador_quantidade' => 120.50,
                'custo_direcionador' => 300.25,
            ],
            [
                'tipo_id' => 2,
                'custo_atividade' => 2500.00,
                'custo_descricao' => 'Custo de atividade B',
                'direcionador_descricao' => 'Número de peças',
                'atividade_direcionador_quantidade' => 200,
                'custo_direcionador' => 500.50,
            ],
        ]);
    }
}
