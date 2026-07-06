<?php

namespace App\Http\Requests\contacts;

use App\Models\Account;
use App\Models\Bairro;
use App\Models\Contact;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'email' => 'required|email|max:60|string|unique:contacts,id|lowercase',
            'indicacoes' => 'nullable|min:20|string|max:300',
            'phone' => 'required|max:20|string|unique:contacts,id',
            'bairro_id' => 'required|integer|numeric|min:1|exists:bairros,id',
            'account_id' => 'required|numeric|integer|min:1',
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
            'account' => 'conta',
            'street' => 'rua',
            'indicacoes' => 'indicações',
        ];
    }

    public function messages()
    {
        return [
            'account_id' => 'Associe o cliente a uma conta. Isso não é uma agenda telefónica.'
        ];
    }
}
