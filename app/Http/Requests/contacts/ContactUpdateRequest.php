<?php

namespace App\Http\Requests\contacts;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactUpdateRequest extends FormRequest
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
            'first_name' => 'required|string|max:35|min:3',
            'last_name' => 'required|string|max:35|min:3',
            'email' => 'required|email|max:60|string|lowercase',
            'indicacoes' => 'nullable|min:20|string|max:300',
            'phone' => 'required|max:20|string',
            'bairro_id' => 'required|integer|numeric|min:1|exists:bairros,id',
            'street' => 'required|max:80|string',
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => 'primeiro nome',
            'last_name' => 'último nome',
            'phone' => 'telefone',
            'bairro_id' => 'bairro/município',
            'street' => 'rua',
            'indicacoes' => 'indicações',
        ];
    }
}
