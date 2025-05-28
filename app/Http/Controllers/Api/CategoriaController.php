<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Http\Request;
use App\Services\CategoriaService;

class CategoriaController extends Controller
{
    protected $categoriaService;

    public function __construct(CategoriaService $categoriaService)
    {
        $this->categoriaService = $categoriaService;
    }

    public function index()
    {
        return response()->json($this->categoriaService->getAll());
    }

    public function store(CategoriaRequest $request)
    {
        $categoria = $this->categoriaService->create($request->validated());
        return response()->json($categoria, 201);
    }

    public function show($id)
    {
        $categoria = $this->categoriaService->getById($id);
        if (!$categoria) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }
        return response()->json($categoria);
    }  

    public function update(CategoriaRequest $request, $id)
    {
        $categoria = $this->categoriaService->update($id, $request->validated());
        if (!$categoria) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }

        return response()->json($categoria);
    }

    public function destroy($id)
    {
        $deleted = $this->categoriaService->delete($id);
        if (!$deleted) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }

        return response()->json(['message' => 'Categoria removida com sucesso']);
    }

}
