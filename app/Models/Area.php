<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'area'; // Nome da tabela real

    const AREA_DESCRICAO = 'area_descricao';

    protected $fillable = [
        'area_descricao',
    ];
}
