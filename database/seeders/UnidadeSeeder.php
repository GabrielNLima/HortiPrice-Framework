<?php

// database/seeders/UnidadeSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('unidade')->insert([
            ['unidade_descricao' => 'Litros'],
            ['unidade_descricao' => 'Quilos'],
            ['unidade_descricao' => 'Metros'],
        ]);
    }
}
