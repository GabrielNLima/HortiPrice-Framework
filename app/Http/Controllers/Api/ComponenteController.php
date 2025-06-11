<?php

namespace App\Http\Controllers;

use App\Enums\ClassificacaoEnum;
use App\Models\Componente;
use Illuminate\Http\JsonResponse;
use App\Services\ComponenteService;
use App\Http\Requests\ComponenteRequest;

class ComponenteController extends Controller {
    public function __construct(protected ComponenteService $service) {}

    public function index(): JsonResponse {
        return response()->json($this->service->all());
    }

    public function show(int $id): JsonResponse {
        return response()->json($this->service->find($id));
    }

    public function store(ComponenteRequest $request): JsonResponse {
        return response()->json($this->service->create($request->validated()), 201);
    }

    public function update(ComponenteRequest $request, Componente $componente): JsonResponse {
        return response()->json($this->service->update($componente, $request->validated()));
    }

    public function destroy(Componente $componente): JsonResponse {
        $this->service->delete($componente);
        return response()->json(null, 204);
    }

    public function classificacoes(){
        return response()->json(ClassificacaoEnum::options());
    }
}
