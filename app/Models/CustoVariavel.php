<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustoVariavel extends Model
{
    protected $table = 'custo_variavel';
    protected $primaryKey = 'custovariavel_id';
    protected $fillable = [
        'custovariavel_fk_tipo',
        'custovariavel_fk_produtividade',
        'custovariavel_precovenda',
        'custovariavel_margem',
    ];

    public function tipo() {
        return $this->belongsTo(Tipo::class, 'custovariavel_fk_tipo');
    }

    public function produtividade() {
        return $this->belongsTo(Produtividade::class, 'custovariavel_fk_produtividade');
    }
}
