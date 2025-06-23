<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AtividadeSeeder extends Seeder
{
    public function run()
    {
        DB::table('atividade')->insert([
            [
                'atividade_descricao' => 'Atividade 1 Exemplo',
                'atividade_fk_unidade' => 1,        // Certifique-se que exista unidade com id 1
                'atividade_fk_custo' => 1,          // Certifique-se que exista custo com id 1
                'atividade_fk_direcionador' => 1,   // Certifique-se que exista direcionador com id 1
                'atividade_direcionador_quantidade' => 100.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'atividade_descricao' => 'Atividade 2 Exemplo',
                'atividade_fk_unidade' => 2,
                'atividade_fk_custo' => 2,
                'atividade_fk_direcionador' => 2,
                'atividade_direcionador_quantidade' => 50.25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Adicione mais se quiser
        ]);
    }
}
