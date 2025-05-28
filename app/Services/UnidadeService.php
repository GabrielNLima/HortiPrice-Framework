<?php
namespace App\Services;

use App\Models\Unidade;
use Illuminate\Support\Facades\DB;

class UnidadeService
{
    public function getAll()
    {
        return Unidade::orderByDesc('id')->paginate(5);
    }

    public function getById(int $id): ?Unidade
    {
        return Unidade::find($id);
    }

    public function create(array $data): Unidade
    {
        return Unidade::create([
            'unidade_descricao' => $data['unidade_descricao']
        ]);
    }

    public function update(int $id, array $data): ?Unidade
    {
        $unidade = Unidade::find($id);
        if ($unidade) {
            $unidade->update([
                'unidade_descricao' => $data['unidade_descricao']
            ]);
        }

        return $unidade;
    }

    public function delete(int $id): bool
    {
        return Unidade::destroy($id) > 0;
    }
}
