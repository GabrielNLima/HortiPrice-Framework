<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustoRequest;
use App\Services\CustoService;
use Illuminate\Http\Request;

class CustoController extends Controller
{
    public function __construct(protected CustoService $service) {}

    public function index(Request $request) {
        $perPage = $request->input('per_page', 5);
        return response()->json($this->service->listar($perPage));
    }

    public function show(int $id) {
        $custo = $this->service->buscar($id);
        return $custo
            ? response()->json($custo)
            : response()->json(['message' => 'Custo não encontrado'], 404);
    }

    public function store(CustoRequest $request) {
        return response()->json($this->service->criar($request->validated()), 201);
    }

    public function update(CustoRequest $request, int $id) {
        $custo = $this->service->atualizar($id, $request->validated());
        return $custo
            ? response()->json($custo)
            : response()->json(['message' => 'Custo não encontrado'], 404);
    }

    public function destroy(int $id) {
        return $this->service->deletar($id)
            ? response()->json(['message' => 'Custo deletado com sucesso'])
            : response()->json(['message' => 'Custo não encontrado'], 404);
    }
}
