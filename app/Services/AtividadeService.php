<?php

namespace App\Services;

use App\Models\Atividade;

class AtividadeService
{
    public function getAll()
    {
        return Atividade::with(['custo', 'direcionador', 'unidade'])
            ->orderBy('id', 'desc')
            ->paginate(5);
    }

    public function getById(int $id)
    {
        return Atividade::with(['custo', 'direcionador', 'unidade'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return Atividade::create($data);
    }

    public function update(int $id, array $data)
    {
        $atividade = Atividade::findOrFail($id);
        $atividade->update($data);
        return $atividade;
    }

    public function delete(int $id)
    {
        $atividade = Atividade::findOrFail($id);
        return $atividade->delete();
    }
}
