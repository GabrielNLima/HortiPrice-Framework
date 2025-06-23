<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class RelatorioAbcService
{
    public function consultar(int $tipo): array
    {
        return DB::select('
            SELECT 
                ROUND(SUM(componente.componente_quantidade * componente.componente_valor_unitario), 2) AS custo_atividade,
                custo.custo_descricao,
                direcionador.direcionador_descricao,
                atividade.atividade_direcionador_quantidade,
                ROUND(
                    SUM(componente.componente_quantidade * componente.componente_valor_unitario) / atividade.atividade_direcionador_quantidade,
                    2
                ) AS custo_direcionador
            FROM componente
            JOIN tipo ON componente.componente_fk_tipo = tipo.id
            JOIN produtividade ON produtividade.produtividade_fk_tipo = tipo.id
            JOIN custo ON componente.componente_fk_custo = custo.id
            JOIN atividade ON atividade.atividade_fk_custo = custo.id
            JOIN direcionador ON atividade.atividade_fk_direcionador = direcionador.id
            WHERE componente.componente_fk_tipo = ?
            GROUP BY componente.componente_fk_custo, custo.custo_descricao, direcionador.direcionador_descricao, atividade.atividade_direcionador_quantidade', [$tipo]);
    }

   public function totalRegistros(int $tipo): int
{
    return DB::table('componente')
        ->join('tipo', 'tipo.id', '=', 'componente.componente_fk_tipo')
        ->join('produtividade', 'produtividade.produtividade_fk_tipo', '=', 'tipo.id')
        ->join('unidade', 'unidade.id', '=', 'componente.componente_fk_unidade')
        ->where('componente.componente_fk_tipo', $tipo)
        ->count();
}

    public function tipos(): array
    {
        return DB::table('tipo')->get()->toArray();
    }
}
