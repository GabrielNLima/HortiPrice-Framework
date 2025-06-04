<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    protected $table = 'componente';
    protected $primaryKey = 'componente_id';
    public $timestamps = false;

    protected $fillable = [
        'componente_descricao',
        'componente_quantidade',
        'componente_valor_unitario',
        'componente_mes',
        'componente_ano',
        'componente_fk_unidade',
        'componente_fk_tipo',
        'componente_fk_custo',
        'componente_fk_classificacao',
    ];

    public function unidade()
    {
        return $this->belongsTo(Unidade::class, 'componente_fk_unidade');
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'componente_fk_tipo');
    }

    public function custo()
    {
        return $this->belongsTo(Custo::class, 'componente_fk_custo');
    }

    public function classificacao()
    {
        return $this->belongsTo(Classificacao::class, 'componente_fk_classificacao');
    }
}
