<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RelatorioAbcRequest;
use App\Services\RelatorioAbcService;
use Illuminate\Http\JsonResponse;

class RelatorioAbcController extends Controller
{
    public function __construct(
        protected RelatorioAbcService $service
    ) {}

    public function consultar(RelatorioAbcRequest $request): JsonResponse
    {
        $dados = $this->service->consultar($request->validated()['tipo']);
        return response()->json($dados);
    }

    public function total(RelatorioAbcRequest $request): JsonResponse
    {
        $total = $this->service->totalRegistros($request->validated()['tipo']);
        return response()->json(['total' => $total]);
    }

    public function tipos(): JsonResponse
    {
        $tipos = $this->service->tipos();
        return response()->json($tipos);
    }
}
