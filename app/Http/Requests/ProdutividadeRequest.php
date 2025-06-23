<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutividadeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Permite todos os testes por enquanto
    }

    public function rules(): array
    {
        return [
            'produtividade_valor' => 'required|numeric|min:0',
            'produtividade_fk_unidade' => 'required|exists:unidade,id',
            'produtividade_mes' => 'required|digits:2',
            'produtividade_ano' => 'required|digits:4',
            'produtividade_fk_tipo' => 'required|exists:tipo,id',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'numeric' => 'O campo :attribute deve ser numérico.',
            'digits' => 'O campo :attribute deve ter :digits dígitos.',
            'exists' => 'O campo :attribute deve referenciar um registro válido.',
        ];
    }
}
