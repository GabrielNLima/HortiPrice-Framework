<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ComponenteService;
use Illuminate\Http\Request;

class ComponenteController extends Controller
{
    protected $service;

    public function __construct(ComponenteService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return response()->json($this->service->listar());
    }

    public function show($id)
    {
        $componente = $this->service->buscarPorId($id);
        if (!$componente) {
            return response()->json(['message' => 'Componente não encontrado'], 404);
        }
        return response()->json($componente);
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'componente_descricao' => 'required|string',
            'componente_quantidade' => 'required|numeric',
            'componente_valor_unitario' => 'required|numeric',
            'componente_mes' => 'required|string',
            'componente_ano' => 'required|integer',
            'componente_fk_unidade' => 'required|exists:unidade,unidade_id',
            'componente_fk_tipo' => 'required|exists:tipo,tipo_id',
            'componente_fk_custo' => 'required|exists:custo,custo_id',
            'componente_fk_classificacao' => 'required|exists:classificacao,classificacao_id',
        ]);

        return response()->json($this->service->criar($dados), 201);
    }

    public function update(Request $request, $id)
    {
        $dados = $request->validate([
            'componente_descricao' => 'required|string',
            'componente_quantidade' => 'required|numeric',
            'componente_valor_unitario' => 'required|numeric',
            'componente_mes' => 'required|string',
            'componente_ano' => 'required|integer',
            'componente_fk_unidade' => 'required|exists:unidade,unidade_id',
            'componente_fk_tipo' => 'required|exists:tipo,tipo_id',
            'componente_fk_custo' => 'required|exists:custo,custo_id',
            'componente_fk_classificacao' => 'required|exists:classificacao,classificacao_id',
        ]);

        return response()->json($this->service->atualizar($id, $dados));
    }

    public function destroy($id)
    {
        $this->service->excluir($id);
        return response()->json(['message' => 'Componente excluído com sucesso.']);
    }
}
