<?php
namespace App\Services;

use App\Models\Area;
use Illuminate\Support\Facades\DB;

class AreaService
{
    public function getAll()
    {
        return Area::orderByDesc('id')->paginate(5);
    }

    public function getById(int $id): ?Area
    {
        return Area::find($id);
    }

    public function create(array $data): Area
    {
        return Area::create([
            'area_descricao' => $data['area_descricao']
        ]);
    }

    public function update(int $id, array $data): ?Area
    {
        $area = Area::find($id);
        if ($area) {
            $area->update([
                'area_descricao' => $data['area_descricao']
            ]);
        }

        return $area;
    }

    public function delete(int $id): bool
    {
        return Area::destroy($id) > 0;
    }
}
