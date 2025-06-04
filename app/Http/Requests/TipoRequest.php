<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tipo_descricao'      => 'required|string|max:255',
            'tipo_fk_area'        => 'required|integer|exists:area,id',
            'tipo_fk_categoria'   => 'required|integer|exists:categoria,id',
            'tipo_fk_subcategoria'=> 'required|integer|exists:sub_categoria,id',
        ];
    }
}
