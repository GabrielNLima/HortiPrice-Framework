<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria'; // Nome da tabela real

    const CATEGORIA_DESCRICAO = 'categoria_descricao';

    protected $fillable = [
        'categoria_descricao',
    ];
}
