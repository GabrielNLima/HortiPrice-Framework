<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelatorioTotaisCusto extends Model
{
    protected $table = 'componente'; // Base principal da query
    public $timestamps = false;

    protected $fillable = [
        'componente_fk_tipo',
        'componente_fk_custo',
        'componente_valor_unitario',
        'componente_quantidade',
    ];
}
