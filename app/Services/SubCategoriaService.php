<?php
namespace App\Services;

use App\Models\SubCategoria;
use Illuminate\Support\Facades\DB;

class SubCategoriaService
{
    public function getAll()
    {
        return SubCategoria::orderByDesc('id')->paginate(5);
    }

    public function getById(int $id): ?SubCategoria
    {
        return SubCategoria::find($id);
    }

    public function create(array $data): SubCategoria
    {
        return SubCategoria::create([
            'sub_categoria_descricao' => $data['sub_categoria_descricao']
        ]);
    }

    public function update(int $id, array $data): ?SubCategoria
    {
        $sub_categoria = SubCategoria::find($id);
        if ($sub_categoria) {
            $sub_categoria->update([
                'sub_categoria_descricao' => $data['sub_categoria_descricao']
            ]);
        }

        return $sub_categoria;
    }

    public function delete(int $id): bool
    {
        return SubCategoria::destroy($id) > 0;
    }
}
