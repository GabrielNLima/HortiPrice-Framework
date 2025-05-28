<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoriaRequest;
use App\Services\SubCategoriaService;
use Illuminate\Http\Request;

class SubCategoriaController extends Controller
{
    protected $subCategoriaService;

    public function __construct(SubCategoriaService $subCategoriaService)
    {
        $this->subCategoriaService = $subCategoriaService;
    }
    public function index(SubCategoriaRequest $request)
    {
        return response()->json($this->subCategoriaService->getAll());
    }
    public function store(SubCategoriaRequest $request)
    {
        $subCategoria = $this->subCategoriaService->create($request->validated());
        return response()->json($subCategoria, 201);
    }
    public function show($id)
    {
        $subCategoria = $this->subCategoriaService->getById($id);
        if (!$subCategoria) {
            return response()->json(["message" => "Subcategoria não encontrada!"], 404);
        }
        return response()->json($subCategoria);
    }
    public function update(SubCategoriaRequest $request, $id)
    {
        $subCategoria = $this->subCategoriaService->update($id, $request->validated());
        if (!$subCategoria) {
            return response()->json(["message" => "Subcategoria não encontrada!"], 404);
        }
        return response()->json($subCategoria);
    }
    public function destroy($id)
    {
        $deleted = $this->subCategoriaService->delete($id);
        if (!$deleted) {
            return response()->json(["message" => "Subcategoria não encontrada!"], 404);
        }
        return response()->json(["message" => "Subcategoria removida com sucesso!"], 200);
    }
}
