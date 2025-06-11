<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustoAbsorcaoRequest;
use App\Http\Requests\StoreCustoAbsorcaoRequest;
use App\Models\CustoAbsorcao;
use App\Services\CustoAbsorcaoService;
use Illuminate\Http\Request;

class CustoAbsorcaoController extends Controller
{
    public function __construct(private CustoAbsorcaoService $service) {}

    public function index()
    {
        return CustoAbsorcao::with(['tipo', 'produtividade'])->paginate(5);
    }

    public function store(CustoAbsorcaoRequest $request)
    {
        $custo = $this->service->store($request->validated());
        return response()->json($custo, 201);
    }

    public function destroy(int $id)
    {
        CustoAbsorcao::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
