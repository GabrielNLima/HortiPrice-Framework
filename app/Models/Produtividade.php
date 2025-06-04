<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtividade extends Model
{
    protected $table = 'produtividade';

    protected $primaryKey = 'produtividade_id';

    protected $fillable = [
        'produtividade_valor',
        'produtividade_fk_unidade',
        'produtividade_mes',
        'produtividade_ano',
        'produtividade_fk_tipo',
    ];

    public function unidade()
    {
        return $this->belongsTo(Unidade::class, 'produtividade_fk_unidade');
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'produtividade_fk_tipo');
    }
}
