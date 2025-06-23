<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo')->insert([
            [
                'tipo_descricao' => 'Semente de Milho',
                'tipo_fk_area' => 1,
                'tipo_fk_categoria' => 1,
                'tipo_fk_subcategoria' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_descricao' => 'Adubo Orgânico',
                'tipo_fk_area' => 1,
                'tipo_fk_categoria' => 1,
                'tipo_fk_subcategoria' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_descricao' => 'Trator Pequeno',
                'tipo_fk_area' => 2,
                'tipo_fk_categoria' => 2,
                'tipo_fk_subcategoria' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
