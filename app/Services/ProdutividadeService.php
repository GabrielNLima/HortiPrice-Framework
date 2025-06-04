<?php
namespace App\Services;

use App\Models\Produtividade;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class ProdutividadeService
{
    public function listar(int $porPagina = 5): LengthAwarePaginator
    {
        return Produtividade::with(['unidade', 'tipo'])
            ->orderByDesc('produtividade_id')
            ->paginate($porPagina);
    }

    public function buscarPorId(int $id): ?Produtividade
    {
        return Produtividade::with(['unidade', 'tipo'])->find($id);
    }

    public function criar(array $dados): Produtividade
    {
        return Produtividade::create($dados);
    }

    public function atualizar(int $id, array $dados): ?Produtividade
    {
        $prod = Produtividade::findOrFail($id);
        $prod->update($dados);
        return $prod;
    }

    public function deletar(int $id): bool
    {
        return Produtividade::destroy($id) > 0;
    }

    public function listarTipos()
    {
        return DB::table('tipo')->get();
    }

    public function listarUnidades()
    {
        return DB::table('unidade')->get();
    }
}
