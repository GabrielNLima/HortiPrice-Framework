<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RelatorioCustoUnitarioRequest;
use App\Services\RelatorioCustoUnitarioService;

class RelatorioCustoUnitarioController extends Controller
{
    public function __construct(protected RelatorioCustoUnitarioService $service) {}

    public function consultar(RelatorioCustoUnitarioRequest $request)
    {
        $relatorio = $this->service->consultar($request->input('tipo_id'));
        return response()->json($relatorio);
    }

    public function paginar(RelatorioCustoUnitarioRequest $request)
    {
        $dados = $this->service->paginar($request->input('tipo_id'));
        return response()->json($dados);
    }

    public function carregarTipos()
    {
        return response()->json($this->service->carregarTipos());
    }
}
