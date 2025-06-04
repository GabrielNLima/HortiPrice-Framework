<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Componente extends Model {
    use HasFactory;

    protected $fillable = ['tipo_id', 'descricao', 'ativo'];

    public function tipo() {
        return $this->belongsTo(Tipo::class);
    }

    protected $casts = [
        'ativo' => 'boolean',
    ];
}
