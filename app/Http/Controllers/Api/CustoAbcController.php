<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustoAbcRequest;
use App\Http\Requests\StoreCustoAbcRequest;
use App\Services\CustoAbcService;
use Illuminate\Http\JsonResponse;

class CustoAbcController extends Controller
{
    public function __construct(protected CustoAbcService $service) {}

    public function index(): JsonResponse
    {
        return response()->json($this->service->listar());
    }

    public function store(CustoAbcRequest $request): JsonResponse
    {
        $custoAbc = $this->service->criar($request->validated());
        return response()->json($custoAbc, 201);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->service->deletar($id);
        return response()->json(['mensagem' => 'Registro removido com sucesso.']);
    }
}
