<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tipo extends Model
{
    protected $table = 'tipo';

    protected $fillable = [
        'tipo_descricao',
        'tipo_fk_area',
        'tipo_fk_categoria',
        'tipo_fk_subcategoria',
    ];

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'tipo_fk_area');
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'tipo_fk_categoria');
    }

    public function subcategoria(): BelongsTo
    {
        return $this->belongsTo(SubCategoria::class, 'tipo_fk_subcategoria');
    }
}