<?php

namespace App\Services;

use App\Models\CustoVariavel;
use App\Models\Componente;
use Illuminate\Support\Facades\DB;

class CustoVariavelService
{
    public function calcularPrecoVenda(int $tipoId, int $produtividadeId, float $margem): float
    {
        $margemDecimal = $margem / 100;

        $resultado = DB::table('componente')
            ->join('tipo', 'componente_fk_tipo', '=', 'tipo.tipo_id')
            ->join('produtividade', 'produtividade_fk_tipo', '=', 'tipo.tipo_id')
            ->where('componente_fk_tipo', $tipoId)
            ->whereIn('componente_fk_classificacao', [1, 3, 4])
            ->selectRaw('ROUND(SUM(componente_quantidade * componente_valor_unitario) / produtividade.produtividade_valor, 2) as resultado')
            ->value('resultado');

        return round($resultado / (1 - $margemDecimal), 2);
    }

    public function criar(array $data): CustoVariavel
    {
        $precoVenda = $this->calcularPrecoVenda(
            $data['custovariavel_fk_tipo'],
            $data['custovariavel_fk_produtividade'],
            $data['custovariavel_margem']
        );

        $data['custovariavel_precovenda'] = $precoVenda;

        return CustoVariavel::create($data);
    }
}
