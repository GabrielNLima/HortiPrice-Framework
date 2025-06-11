<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustoAbsorcaoRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'custoabsorcao_fk_tipo' => ['required', 'exists:tipos,id'],
            'custoabsorcao_fk_produtividade' => ['required', 'exists:produtividade,id'],
            'custoabsorcao_margem' => ['required', 'numeric', 'min:0', 'max:100'],
        ];
    }
}
