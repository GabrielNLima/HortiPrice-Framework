<?php

namespace App\Models;

use App\Enums\ClassificacaoEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Componente extends Model {
    use HasFactory;

    protected $table = "componente";

    protected $fillable = [
    'tipo_id', 
    'descricao', 
    'ativo',
    'classificacao'
];

    public function tipo() {
        return $this->belongsTo(Tipo::class);
    }

    protected $casts = [
        'classificacao' => ClassificacaoEnum::class,
    ];
}
