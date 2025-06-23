<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UnidadeRequest;
use App\Services\UnidadeService;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    protected $unidadeService;

    public function __construct(UnidadeService $unidadeService)
    {
        $this->unidadeService = $unidadeService;
    }
    public function index()
    {
        return response()->json($this->unidadeService->getAll());
    }
    public function store(UnidadeRequest $request)
    {
        $subCategoria = $this->unidadeService->create($request->validated());
        return response()->json($subCategoria, 201);
    }
    public function show($id)
    {
        $subCategoria = $this->unidadeService->getById($id);
        if (!$subCategoria) {
            return response()->json(["message" => "Subcategoria não encontrada!"], 404);
        }
        return response()->json($subCategoria);
    }
    public function update(UnidadeRequest $request, $id)
    {
        $subCategoria = $this->unidadeService->update($id, $request->validated());
        if (!$subCategoria) {
            return response()->json(["message" => "Subcategoria não encontrada!"], 404);
        }
        return response()->json($subCategoria);
    }
    public function destroy($id)
    {
        $deleted = $this->unidadeService->delete($id);
        if (!$deleted) {
            return response()->json(["message" => "Subcategoria não encontrada!"], 404);
        }
        return response()->json(["message" => "Subcategoria removida com sucesso!"], 200);
    }
}
