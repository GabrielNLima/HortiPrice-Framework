<?php
namespace App\Services;

use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class CategoriaService
{
    public function getAll()
    {
        return Categoria::orderByDesc('id')->paginate(5);
    }

    public function getById(int $id): ?Categoria
    {
        return Categoria::find($id);
    }

    public function create(array $data): Categoria
    {
        return Categoria::create([
            'categoria_descricao' => $data['categoria_descricao']
        ]);
    }

    public function update(int $id, array $data): ?Categoria
    {
        $categoria = Categoria::find($id);
        if ($categoria) {
            $categoria->update([
                'categoria_descricao' => $data['categoria_descricao']
            ]);
        }

        return $categoria;
    }

    public function delete(int $id): bool
    {
        return Categoria::destroy($id) > 0;
    }
}
