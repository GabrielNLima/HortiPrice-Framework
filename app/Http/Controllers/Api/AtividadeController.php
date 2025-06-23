<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AtividadeRequest;
use App\Services\AtividadeService;

class AtividadeController extends Controller
{
    protected $atividadeService;

    public function __construct(AtividadeService $atividadeService)
    {
        $this->atividadeService = $atividadeService;
    }

    public function index()
    {
        return response()->json($this->atividadeService->getAll());
    }

    public function show($id)
    {
        return response()->json($this->atividadeService->getById($id));
    }

    public function store(AtividadeRequest $request)
    {
        return response()->json($this->atividadeService->create($request->validated()));
    }

    public function update(AtividadeRequest $request, $id)
    {
        return response()->json($this->atividadeService->update($id, $request->validated()));
    }

    public function destroy($id)
    {
        return response()->json($this->atividadeService->delete($id));
    }
}
