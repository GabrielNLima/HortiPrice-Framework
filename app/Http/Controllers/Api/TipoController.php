<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TipoRequest;
use App\Services\TipoService;

class TipoController extends Controller
{
    protected $tipoService;

    public function __construct(TipoService $tipoService)
    {
        $this->tipoService = $tipoService;
    }

    public function index(TipoRequest $request)
    {
        return response()->json($this->tipoService->getAll());
    }

    public function store(TipoRequest $request)
    {
        $tipo = $this->tipoService->create($request->validated());
        return response()->json($tipo, 201);
    }

    public function show($id)
    {
        $tipo = $this->tipoService->getById($id);
        if (!$tipo) {
            return response()->json(["message" => "Tipo não encontrado!"], 404);
        }
        return response()->json($tipo);
    }

    public function update(TipoRequest $request, $id)
    {
        $tipo = $this->tipoService->update($id, $request->validated());
        if (!$tipo) {
            return response()->json(["message" => "Tipo não encontrado!"], 404);
        }
        return response()->json($tipo);
    }

    public function destroy($id)
    {
        $deleted = $this->tipoService->delete($id);
        if (!$deleted) {
            return response()->json(["message" => "Tipo não encontrado!"], 404);
        }
        return response()->json(["message" => "Tipo removido com sucesso!"], 200);
    }
}
