<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \App\ClassificacaoEnum;

class ComponenteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('componente')->insert([
            [
                'componente_fk_tipo' => 1,
                'componente_fk_unidade' => 1,
                'componente_fk_custo' => 1,
                'componente_descricao' => 'Componente A',
                'componente_quantidade' => 10,
                'componente_valor_unitario' => 15.50,
                'componente_mes' => '06',
                'componente_ano' => 2025,
                'classificacao' => ClassificacaoEnum::CUSTO_VARIAVEL->value,
                'ativo' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'componente_fk_tipo' => 2,
                'componente_fk_unidade' => 2,
                'componente_fk_custo' => 2,
                'componente_descricao' => 'Componente B',
                'componente_quantidade' => 5,
                'componente_valor_unitario' => 30.75,
                'componente_mes' => '06',
                'componente_ano' => 2025,
                'classificacao' => ClassificacaoEnum::CUSTO_FIXO->value,
                'ativo' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
