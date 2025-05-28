<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    protected $table = "sub_categoria"; // NOME ALTERADO DO ORIGINAL subcategoria

    const SUB_CATEGORIA_DESCRICAO = "sub_categoria_descricao";

    protected $fillable = [
        "sub_categoria_descricao",
    ];
}
