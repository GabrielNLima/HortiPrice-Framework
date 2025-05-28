<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRequest;
use Illuminate\Http\Request;
use App\Services\AreaService;

class AreaController extends Controller
{
    protected $areaService;

    public function __construct(AreaService $areaService)
    {
        $this->areaService = $areaService;
    }

    public function index()
    {
        return response()->json($this->areaService->getAll());
    }

    public function show($id)
    {
        $area = $this->areaService->getById($id);
        if (!$area) {
            return response()->json(['message' => 'Área não encontrada'], 404);
        }
        return response()->json($area);
    }

    public function store(AreaRequest $request)
    {
        
        $area = $this->areaService->create($request->validated());
        return response()->json($area, 201);
    }

    public function update(AreaRequest $request, $id)
    {

        $area = $this->areaService->update($id, $request->validated());
        if (!$area) {
            return response()->json(['message' => 'Área não encontrada'], 404);
        }

        return response()->json($area);
    }

    public function destroy($id)
    {
        $deleted = $this->areaService->delete($id);
        if (!$deleted) {
            return response()->json(['message' => 'Área não encontrada'], 404);
        }

        return response()->json(['message' => 'Área removida com sucesso']);
    }
}
