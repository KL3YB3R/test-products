<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name_product' => 'required',
            'price_product' => 'required|numeric|gt:0',
        ];
    }

    public function messages()
    {
        return [
            'name_product.required' => 'El nombre del producto es requerido.',
            'price_product.required' => 'El precio del producto es requerido.',
            'price_product.numeric' => 'El precio debe ser un número.',
            'price_product.gt' => 'El precio debe ser mayor a 0.',
        ];
    }
}
