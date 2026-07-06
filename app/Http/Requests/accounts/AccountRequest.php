<?php

namespace App\Http\Requests\accounts;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50|min:3',
            'is_active' => 'required|integer|min:0|max:1|boolean',
            'type' => 'required|string|'. Rule::in(['empresarial', 'residêncial']),
            'street' => 'required|string|max:80',
            'indicacoes' => 'nullable|min:20|string|max:300',
            'bairro_id' => 'required|integer|min:0|exists:bairros,id'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome da conta',
            'is_active' => 'estado da conta',
            'type' => 'tipo de conta',
            'indicacoes' => 'indicações',
            'bairro_id' => 'bairro/município',
            'street' => 'rua',
        ];
    }
}
