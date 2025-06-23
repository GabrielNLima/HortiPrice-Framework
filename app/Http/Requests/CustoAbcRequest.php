<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustoAbcRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'custoabc_fk_tipo' => 'required|exists:tipo,id',
            'custoabc_fk_produtividade' => 'required|exists:produtividade,id',
            'custoabc_margem' => 'required|numeric|min:0|max:100',
        ];
    }
}
