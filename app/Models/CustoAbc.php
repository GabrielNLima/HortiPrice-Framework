<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustoAbc extends Model
{
    protected $table = 'custoabc';

    protected $fillable = [
        'custoabc_fk_tipo',
        'custoabc_fk_produtividade',
        'custoabc_precovenda',
        'custoabc_margem',
    ];

    public function tipo() {
        return $this->belongsTo(Tipo::class, 'custoabc_fk_tipo', 'id');
    }

    public function produtividade() {
        return $this->belongsTo(Produtividade::class, 'custoabc_fk_produtividade', 'id');
    }
}
