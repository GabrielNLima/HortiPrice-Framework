<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustoAbsorcao extends Model
{
    use HasFactory;

    protected $table = 'custoabsorcao';

    protected $fillable = [
        'custoabsorcao_fk_tipo',
        'custoabsorcao_fk_produtividade',
        'custoabsorcao_precovenda',
        'custoabsorcao_margem',
    ];

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'custoabsorcao_fk_tipo');
    }

    public function produtividade()
    {
        return $this->belongsTo(Produtividade::class, 'custoabsorcao_fk_produtividade');
    }
}
