<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ProdutividadeService;
use Illuminate\Http\Request;

class ProdutividadeController extends Controller
{
    protected $service;

    public function __construct(ProdutividadeService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $porPagina = $request->input('per_page', 5);
        return response()->json($this->service->listar($porPagina));
    }

    public function show($id)
    {
        $prod = $this->service->buscarPorId($id);
        return $prod ? response()->json($prod) : response()->json(['erro' => 'Não encontrado'], 404);
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'produtividade_valor' => 'required|numeric',
            'produtividade_fk_unidade' => 'required|integer|exists:unidade,unidade_id',
            'produtividade_mes' => 'required|integer|min:1|max:12',
            'produtividade_ano' => 'required|integer|min:2000|max:2100',
            'produtividade_fk_tipo' => 'required|integer|exists:tipo,tipo_id',
        ]);

        $nova = $this->service->criar($dados);
        return response()->json($nova, 201);
    }

    public function update(Request $request, $id)
    {
        $dados = $request->validate([
            'produtividade_valor' => 'required|numeric',
            'produtividade_fk_unidade' => 'required|integer|exists:unidade,unidade_id',
            'produtividade_mes' => 'required|integer|min:1|max:12',
            'produtividade_ano' => 'required|integer|min:2000|max:2100',
            'produtividade_fk_tipo' => 'required|integer|exists:tipo,tipo_id',
        ]);

        $prod = $this->service->atualizar($id, $dados);
        return response()->json($prod);
    }

    public function destroy($id)
    {
        $ok = $this->service->deletar($id);
        return $ok ? response()->json([], 204) : response()->json(['erro' => 'Não encontrado'], 404);
    }

    public function tipos()
    {
        return response()->json($this->service->listarTipos());
    }

    public function unidades()
    {
        return response()->json($this->service->listarUnidades());
    }
}
