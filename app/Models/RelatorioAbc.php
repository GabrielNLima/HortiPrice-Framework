<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelatorioAbc extends Model
{
    protected $table = 'componente'; // Tabela principal usada na consulta

    public $timestamps = false;

    protected $fillable = [
        'componente_fk_tipo',
        'componente_valor_unitario',
        'componente_quantidade',
    ];
}
