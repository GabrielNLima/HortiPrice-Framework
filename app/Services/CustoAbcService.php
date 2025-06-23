<?php

namespace App\Services;

use App\Models\CustoAbc;
use Illuminate\Support\Facades\DB;

class CustoAbcService
{
    public function listar()
    {
        return CustoAbc::with(['tipo', 'produtividade'])->latest('id')->get();
    }

    public function calcularPrecoVendaABC(int $tipoId, int $produtividadeId, float $margem): float
    {
        $resultado = DB::table('componente')
            ->join('tipo', 'componente_fk_tipo', '=', 'tipo_id')
            ->join('produtividade', 'produtividade_fk_tipo', '=', 'tipo_id')
            ->where('componente_fk_tipo', $tipoId)
            ->where('produtividade_fk_tipo', $tipoId)
            ->where('componente_fk_classificacao', 1)
            ->selectRaw('ROUND(SUM(componente_quantidade * componente_valor_unitario) / produtividade.produtividade_valor, 2) as resultado')
            ->value('resultado');

        return round($resultado / (1 - ($margem / 100)), 2);
    }

    public function criar(array $dados)
    {
        $precoVenda = $this->calcularPrecoVendaABC(
            $dados['custoabc_fk_tipo'],
            $dados['custoabc_fk_produtividade'],
            $dados['custoabc_margem']
        );

        return CustoAbc::create([
            ...$dados,
            'custoabc_precovenda' => $precoVenda,
        ]);
    }

    public function deletar(int $id): void
    {
        CustoAbc::where('custoabc_id', $id)->delete();
    }
}
