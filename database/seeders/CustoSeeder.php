<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustoSeeder extends Seeder
{
    public function run()
    {
        DB::table('custo')->insert([
            ['custo_descricao' => 'Custo Fixo'],
            ['custo_descricao' => 'Custo Variável'],
            ['custo_descricao' => 'Custo Direto'],
            ['custo_descricao' => 'Custo Indireto'],
            ['custo_descricao' => 'Custo de Produção'],
        ]);
    }
}
