<?php

namespace App\Services;

use App\Models\CustoAbsorcao;
use App\Models\Componente;

class CustoAbsorcaoService
{
    public function calcularPrecoVenda(int $tipoId, float $margem): float
    {
        $custoUnitario = Componente::where('componente_fk_tipo', $tipoId)
            ->selectRaw('ROUND(SUM(componente_quantidade * componente_valor_unitario) / (
                SELECT produtividade_valor FROM produtividade WHERE produtividade_fk_tipo = ?
            ), 2) as resultado', [$tipoId])
            ->value('resultado');

        return round($custoUnitario / (1 - ($margem / 100)), 2);
    }

    public function store(array $data): CustoAbsorcao
    {
        $precoVenda = $this->calcularPrecoVenda($data['custoabsorcao_fk_tipo'], $data['custoabsorcao_margem']);
        $data['custoabsorcao_precovenda'] = $precoVenda;

        return CustoAbsorcao::create($data);
    }
}
