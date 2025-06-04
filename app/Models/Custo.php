<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Custo extends Model
{
    protected $table = "custo";

    const CUSTO_DESCRICAO = "custo_descricao";
    protected $fillable = ['custo_descricao'];
}
