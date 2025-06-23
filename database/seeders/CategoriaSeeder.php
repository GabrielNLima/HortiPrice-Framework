<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categoria')->insert([
            ['categoria_descricao' => 'Insumos Agrícolas'],
            ['categoria_descricao' => 'Equipamentos'],
            ['categoria_descricao' => 'Mão de Obra'],
            ['categoria_descricao' => 'Serviços Terceirizados'],
            ['categoria_descricao' => 'Materiais Diversos'],
        ]);
    }
}
