<?php

namespace App\Http\Requests;

use App\ClassificacaoEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ComponenteRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'componente_fk_tipo'   => 'required|exists:tipo,id',
            'componente_descricao' => 'required|string|max:255',
            'classificacao'        => ['required', Rule::enum(ClassificacaoEnum::class)],
            'componente_fk_unidade' => 'required|exists:unidade,id',
            'componente_fk_custo'   => 'required|exists:custo,id',
            'componente_quantidade' => 'required|numeric|min:0',
            'componente_valor_unitario' => 'required|numeric|min:0',
            'componente_mes'       => 'required|string|max:255',
            'componente_ano'       => 'required|integer|min:2000|max:2100',
            'ativo'                => 'boolean'
        ];
    }
}
