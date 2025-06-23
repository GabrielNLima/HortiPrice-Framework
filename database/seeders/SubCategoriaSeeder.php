<?php

// database/seeders/SubCategoriaSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategoriaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sub_categoria')->insert([
            ['sub_categoria_descricao' => 'Defensivos'],
            ['sub_categoria_descricao' => 'Adubos'],
            ['sub_categoria_descricao' => 'Ferramentas'],
        ]);
    }
}
