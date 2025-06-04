<?php

namespace App\Services;

use App\Models\Tipo;
use Illuminate\Support\Facades\DB;

class TipoService
{
    public function getAll()
    {
        return Tipo::with(['area', 'categoria', 'subcategoria'])
                   ->orderByDesc('id')
                   ->paginate(5);
    }

    public function getById(int $id): ?Tipo
    {
        return Tipo::with(['area', 'categoria', 'subcategoria'])->find($id);
    }

    public function create(array $data): Tipo
    {
        return Tipo::create([
            'tipo_descricao'     => $data['tipo_descricao'],
            'tipo_fk_area'       => $data['tipo_fk_area'],
            'tipo_fk_categoria'  => $data['tipo_fk_categoria'],
            'tipo_fk_subcategoria' => $data['tipo_fk_subcategoria'],
        ]);
    }

    public function update(int $id, array $data): ?Tipo
    {
        $tipo = Tipo::find($id);

        if ($tipo) {
            $tipo->update([
                'tipo_descricao'     => $data['tipo_descricao'],
                'tipo_fk_area'       => $data['tipo_fk_area'],
                'tipo_fk_categoria'  => $data['tipo_fk_categoria'],
                'tipo_fk_subcategoria' => $data['tipo_fk_subcategoria'],
            ]);
        }

        return $tipo;
    }

    public function delete(int $id): bool
    {
        return Tipo::destroy($id) > 0;
    }
}
