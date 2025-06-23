<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $table = 'unidade';

    const UNIDADE_DESCRICAO = "unidade_descricao";

    protected $fillable = [
        "unidade_descricao"
    ];
}
