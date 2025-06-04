<?php 

namespace App\Services;

use App\Models\Componente;
use Illuminate\Database\Eloquent\Collection;

class ComponenteService {
    public function all(): Collection {
        return Componente::with('tipo')->get();
    }

    public function find(int $id): Componente {
        return Componente::with('tipo')->findOrFail($id);
    }

    public function create(array $data): Componente {
        return Componente::create($data);
    }

    public function update(Componente $componente, array $data): Componente {
        $componente->update($data);
        return $componente;
    }

    public function delete(Componente $componente): void {
        $componente->delete();
    }
}
