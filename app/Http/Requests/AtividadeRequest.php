<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtividadeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'atividade_descricao' => 'required|string|max:255',
            'atividade_fk_custo' => 'required|integer|exists:custo,id',
            'atividade_fk_direcionador' => 'required|integer|exists:direcionador,id',
            'atividade_direcionador_quantidade' => 'required|numeric|min:0',
            'atividade_fk_unidade' => 'required|integer|exists:unidade,id',
        ];
    }
}
