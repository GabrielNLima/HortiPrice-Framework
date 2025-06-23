<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustoAbcSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('custoabc')->insert([
            [
                'custoabc_fk_tipo' => 1,
                'custoabc_fk_produtividade' => 1,
                'custoabc_precovenda' => 120.00,
                'custoabc_margem' => 25.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'custoabc_fk_tipo' => 2,
                'custoabc_fk_produtividade' => 2,
                'custoabc_precovenda' => 180.50,
                'custoabc_margem' => 18.75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
