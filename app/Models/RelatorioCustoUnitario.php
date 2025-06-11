<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelatorioCustoUnitario extends Model
{
    protected $table = 'relatorio_custo_unitario_view'; // Será uma view | ver como está no front 
    public $timestamps = false;
    protected $guarded = [];
}
