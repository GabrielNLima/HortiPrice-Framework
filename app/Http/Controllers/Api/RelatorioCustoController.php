<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RelatorioCustoRequest;
use App\Services\RelatorioCustoService;
use Illuminate\Http\Request;

class RelatorioCustoController extends Controller
{
    protected $service;

    public function __construct(RelatorioCustoService $service)
    {
        $this->service = $service;
    }

    public function consultar(RelatorioCustoRequest $request)
    {
        $dados = $request->validated();
        $resultado = $this->service->consultar($dados);
        return response()->json($resultado);
    }

    public function tipos()
    {
        return response()->json($this->service->listarTipos());
    }

    public function paginacao(Request $request)
    {
        $dados = $request->validate([
            'tipo' => 'required|exists:tipo,tipo_id',
        ]);

        $porPagina = $request->input('per_page', 5);
        $resultado = $this->service->paginar($dados, $porPagina);
        return response()->json($resultado);
    }
}
