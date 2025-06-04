<?php

namespace App\Http\Requests;

use App\Models\Custo;
use Illuminate\Foundation\Http\FormRequest;

class CustoRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            Custo::CUSTO_DESCRICAO => 'required|string|max:255',
        ];
    }
}
