<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direcionador extends Model
{
    protected $table = "direcionador";

    const DIRECIONADOR_DESCRICAO = "direcionador_descricao";

    protected $fillable = [
        "direcionador_descricao",
    ];
}
