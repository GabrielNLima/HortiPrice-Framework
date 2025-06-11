<?php

namespace App\Services;

use App\Models\RelatorioCustoUnitario;

class RelatorioCustoUnitarioService
{
    public function consultar(int $tipoId)
    {
        return RelatorioCustoUnitario::where('tipo_id', $tipoId)->first();
    }

    public function paginar(int $tipoId, int $perPage = 5)
    {
        return RelatorioCustoUnitario::where('tipo_id', $tipoId)->paginate($perPage);
    }

    public function carregarTipos()
    {
        return \App\Models\Tipo::all();
    }
}
