<?php

namespace App\Services;

use App\Models\Custo;
use Illuminate\Pagination\LengthAwarePaginator;

class CustoService
{
    public function listar(int $perPage = 5): LengthAwarePaginator {
        return Custo::orderByDesc('id')->paginate($perPage);
    }

    public function buscar(int $id): ?Custo {
        return Custo::find($id);
    }

    public function criar(array $dados): Custo {
        return Custo::create($dados);
    }

    public function atualizar(int $id, array $dados): ?Custo {
        $custo = Custo::find($id);
        if ($custo) {
            $custo->update($dados);
        }
        return $custo;
    }

    public function deletar(int $id): bool {
        $custo = Custo::find($id);
        return $custo ? $custo->delete() : false;
    }
}
