<?php

namespace App\Http\Requests\plans;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PlanUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'price' => 'required|numeric|gte:10000|min_digits:4|max_digits:6',
            'description' => 'nullable|string|max:300',
            'velocity_download' => 'required|integer|numeric|min:2|max_digits:3|max:120',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome do plano',
            'price' => 'preço',
            'description' => 'descrição',
            'velocity_download' => 'velocidade de download',
        ];
    }
}
