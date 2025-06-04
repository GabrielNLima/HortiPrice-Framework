<?php

namespace App\Services;

use App\Models\Componente;

class ComponenteService
{
    public function listar($porPagina = 5)
    {
        return Componente::with(['unidade', 'tipo', 'custo', 'classificacao'])
                         ->orderByDesc('componente_id')
                         ->paginate($porPagina);
    }

    public function buscarPorId($id)
    {
        return Componente::with(['unidade', 'tipo', 'custo', 'classificacao'])->find($id);
    }

    public function criar(array $dados)
    {
        return Componente::create($dados);
    }

    public function atualizar($id, array $dados)
    {
        $componente = Componente::findOrFail($id);
        $componente->update($dados);
        return $componente;
    }

    public function excluir($id)
    {
        $componente = Componente::findOrFail($id);
        return $componente->delete();
    }
}
