<?php

namespace App\Http\Requests;

use App\Enums\ClassificacaoEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class ComponenteRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'tipo_id'   => 'required|exists:tipos,id',
            'descricao' => 'required|string|max:255',
            'classificacao' => ['required', new Enum(ClassificacaoEnum::class)],
        ];
    }
}
