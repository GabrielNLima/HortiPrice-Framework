<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustoVariavelRequest;
use App\Http\Requests\StoreCustoVariavelRequest;
use App\Models\CustoVariavel;
use App\Models\Tipo;
use App\Models\Produtividade;
use App\Services\CustoVariavelService;
use Illuminate\Http\Request;

class CustoVariavelController extends Controller
{
    public function index()
    {
        return CustoVariavel::with(['tipo', 'produtividade'])
            ->orderByDesc('id')
            ->paginate(5);
    }

    public function store(CustoVariavelRequest $request, CustoVariavelService $service)
    {
        $custovariavel = $service->criar($request->validated());
        return response()->json($custovariavel, 201);
    }

    public function destroy(int $id)
    {
        $custovariavel = CustoVariavel::findOrFail($id);
        $custovariavel->delete();

        return response()->json(['message' => 'Registro excluído com sucesso.']);
    }

    public function tipos()
    {
        return Tipo::all();
    }

    public function produtividades()
    {
        return Produtividade::all();
    }
}
