<?php
namespace App\Services;

use App\Models\Direcionador;
use Illuminate\Support\Facades\DB;

class DirecionadorService
{
    public function getAll()
    {
        return Direcionador::orderByDesc('id')->paginate(5);
    }

    public function getById(int $id): ?Direcionador
    {
        return Direcionador::find($id);
    }

    public function create(array $data): Direcionador
    {
        return Direcionador::create([
            'direcionador_descricao' => $data['direcionador_descricao']
        ]);
    }

    public function update(int $id, array $data): ?Direcionador
    {
        $direcionador = Direcionador::find($id);
        if ($direcionador) {
            $direcionador->update([
                'direcionador_descricao' => $data['direcionador_descricao']
            ]);
        }

        return $direcionador;
    }

    public function delete(int $id): bool
    {
        return Direcionador::destroy($id) > 0;
    }
}
