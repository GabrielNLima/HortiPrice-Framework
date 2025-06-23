<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('area')->insert([
            ['area_descricao' => 'Área 1 - Setor Experimental'],
            ['area_descricao' => 'Área 2 - Estufa Principal'],
            ['area_descricao' => 'Área 3 - Campo Aberto'],
            ['area_descricao' => 'Área 4 - Viveiro de Mudas'],
            ['area_descricao' => 'Área 5 - Testes de Fertilizante'],
        ]);
    }
}
