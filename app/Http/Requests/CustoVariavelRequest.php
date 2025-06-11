<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustoVariavelRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'custovariavel_fk_tipo' => 'required|exists:tipo,tipo_id',
            'custovariavel_fk_produtividade' => 'required|exists:produtividade,produtividade_id',
            'custovariavel_margem' => 'required|numeric|min:0|max:100',
        ];
    }
}
