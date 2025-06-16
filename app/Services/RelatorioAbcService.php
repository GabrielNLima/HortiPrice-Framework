<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class RelatorioAbcService
{
    public function consultar(int $tipo): array
    {
        return DB::select(
            'SELECT 
                ROUND(SUM(componente_quantidade * componente_valor_unitario), 2) AS custo_atividade,
                custo_descricao,
                direcionador_descricao,
                atividade_direcionador_quantidade,
                ROUND(SUM(componente_quantidade * componente_valor_unitario)/atividade_direcionador_quantidade, 2) AS custo_direcionador
            FROM componente
            JOIN tipo ON tipo_id = ?
            JOIN produtividade ON produtividade_fk_tipo = ?
            JOIN custo ON componente_fk_custo = custo_id
            JOIN atividade ON atividade_fk_custo = custo_id
            JOIN direcionador ON atividade_fk_direcionador = direcionador_id
            WHERE componente_fk_tipo = ?
            GROUP BY componente_fk_custo',
            [$tipo, $tipo, $tipo]
        );
    }

    public function totalRegistros(int $tipo): int
    {
        return DB::table('componente')
            ->join('tipo', 'tipo.tipo_id', '=', 'componente_fk_tipo')
            ->join('produtividade', 'produtividade.produtividade_fk_tipo', '=', 'tipo.tipo_id')
            ->join('unidade', 'unidade.unidade_id', '=', 'componente_fk_unidade')
            ->where('componente_fk_tipo', $tipo)
            ->count();
    }

    public function tipos(): array
    {
        return DB::table('tipo')->get()->toArray();
    }
}
