<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RelatorioTotaisCustoRequest;
use App\Services\RelatorioTotaisCustoService;

class RelatorioTotaisCustoController extends Controller
{
    protected $service;

    public function __construct(RelatorioTotaisCustoService $service)
    {
        $this->service = $service;
    }

    public function consultarTotais(RelatorioTotaisCustoRequest $request)
    {
        $tipoId = $request->input('tipo');
        $resultados = $this->service->consultarTotais($tipoId);

        return response()->json($resultados);
    }
}
