<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBrandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required', 
                'string', 
                'max:255', 
                Rule::unique('brands', 'name')->ignore($this->route('brand'))
            ],
            'country' => ['nullable', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле «:attribute» обязательно для заполнения',
            'name.unique' => 'Марка с таким названием уже существует',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'название марки',
            'country' => 'страна',
        ];
    }
}