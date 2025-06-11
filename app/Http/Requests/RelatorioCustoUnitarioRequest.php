<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RelatorioCustoUnitarioRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'tipo_id' => 'required|integer|exists:tipo,tipo_id',
        ];
    }
}
