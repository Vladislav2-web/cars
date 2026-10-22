<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_available' => $this->boolean('is_available'),
        ]);
    }

    public function rules(): array
    {
        return [
            'brand_id'     => ['required', 'exists:brands,id'],
            'title'        => ['required', 'string', 'max:255', 'unique:cars,title'],
            'year'         => ['required', 'integer', 'between:2015,2026'],
            'price'        => ['required', 'numeric', 'min:0'],
            'description'  => ['nullable', 'string', 'max:2000'],
            'is_available' => ['boolean'],
            'cover' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'required'      => 'Поле «:attribute» обязательно для заполнения',
            'title.unique'  => 'Автомобиль с таким названием уже существует',
            'year.between'  => 'Год выпуска должен быть в диапазоне от :min до :max',
            'exists'        => 'Выбранный элемент не найден в базе данных',
        ];
    }

    public function attributes(): array
    {
        return [
            'brand_id'    => 'марка',
            'title'       => 'название',
            'year'        => 'год выпуска',
            'price'       => 'цена',
            'description' => 'описание',
        ];
    }
}