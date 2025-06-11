<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class RelatorioTotaisCustoService
{
    public function consultarTotais(int $tipoId): array
    {
        return DB::table('componente')
            ->join('tipo', 'tipo.id', '=', 'componente.componente_fk_tipo')
            ->join('produtividade', 'produtividade.produtividade_fk_tipo', '=', 'tipo.id')
            ->join('custo', 'custo.id', '=', 'componente.componente_fk_custo')
            ->selectRaw('ROUND(SUM(componente_quantidade * componente_valor_unitario), 2) AS total, custo_descricao')
            ->where('componente.componente_fk_tipo', $tipoId)
            ->where('tipo.id', $tipoId)
            ->where('produtividade.produtividade_fk_tipo', $tipoId)
            ->groupBy('componente.componente_fk_custo')
            ->get()
            ->toArray();
    }
}
