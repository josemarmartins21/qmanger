<?php

namespace App\Http\Requests\signatures;


use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SignatureRequest extends FormRequest
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
            'account_id' => 'required|min:0|integer|exists:accounts,id',
            'plan_id' => 'required|min:0|integer|exists:plans,id',
            'discount' => 'nullable|numeric|min:0',
            'start_date' => 'nullable|date|'. Rule::date()->afterOrEqual(date('Y-m-d')),
        ];
    }

    public function attributes(): array
    {
        return [
            'account_id' => 'conta',
            'plan_id' => 'plano',
            'discount' => 'desconto',
            'start_date' => 'data de início',
        ];
    }
}
