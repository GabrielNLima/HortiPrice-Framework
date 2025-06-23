<?php

namespace Database\Seeders;

use App\Models\Atividade;
use App\Models\CustoAbsorcao;
use App\Models\RelatorioTotaisCusto;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
        AreaSeeder::class,
        CategoriaSeeder::class,
        SubCategoriaSeeder::class,
        DirecionadorSeeder::class,
        UnidadeSeeder::class,
        TipoSeeder::class,
        CustoSeeder::class,
        ProdutividadeSeeder::class,
        AtividadeSeeder::class,
        ComponenteSeeder::class,
        CustoAbsorcaoSeeder::class,
        CustoVariavelSeeder::class,
        RelatorioTotaisCustoSeeder::class,
        CustoAbcSeeder::class,
        RelatorioAbcSeeder::class,
    ]);
    }
}
