<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $table = 'atividade';
    protected $fillable = [
        'atividade_descricao',
        'atividade_fk_custo',
        'atividade_fk_direcionador',
        'atividade_direcionador_quantidade',
        'atividade_fk_unidade',
    ];

    public function custo()
    {
        return $this->belongsTo(Custo::class, 'atividade_fk_custo');
    }

    public function direcionador()
    {
        return $this->belongsTo(Direcionador::class, 'atividade_fk_direcionador');
    }

    public function unidade()
    {
        return $this->belongsTo(Unidade::class, 'atividade_fk_unidade');
    }
}
