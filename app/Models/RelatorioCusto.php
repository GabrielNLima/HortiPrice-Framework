<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelatorioCusto extends Model
{
    protected $table = 'componente';

    protected $primaryKey = 'componente_id';

    protected $fillable = [
        'componente_descricao',
        'componente_quantidade',
        'componente_valor_unitario',
        'componente_fk_tipo',
        'componente_fk_unidade',
    ];

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'componente_fk_tipo');
    }

    public function unidade()
    {
        return $this->belongsTo(Unidade::class, 'componente_fk_unidade');
    }
}
