<?php

// database/seeders/DirecionadorSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirecionadorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('direcionador')->insert([
            ['direcionador_descricao' => 'Horas Trabalhadas'],
            ['direcionador_descricao' => 'Área Cultivada'],
            ['direcionador_descricao' => 'Quantidade Produzida'],
        ]);
    }
}

