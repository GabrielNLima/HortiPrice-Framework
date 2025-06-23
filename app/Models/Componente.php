<?php

namespace App\Models;

use App\ClassificacaoEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Componente extends Model {
    use HasFactory;

    protected $table = "componente";

    protected $fillable = [
        'componente_fk_tipo',
        'componente_fk_unidade',
        'componente_fk_custo',
        'componente_descricao',
        'componente_quantidade',
        'componente_valor_unitario',
        'componente_mes',
        'componente_ano', 
        'ativo',
        'classificacao',
    ];

    protected $casts = [
        'classificacao' => ClassificacaoEnum::class,
    ];

    public function tipo() {
        return $this->belongsTo(Tipo::class, 'componente_fk_tipo');
    }

    public function unidade() {
        return $this->belongsTo(Unidade::class, 'componente_fk_unidade');
    }

    public function custo() {
        return $this->belongsTo(Custo::class, 'componente_fk_custo');
    }
}
