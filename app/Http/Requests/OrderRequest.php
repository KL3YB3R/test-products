<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'user_id'     => 'required',
            'productos'   => 'required|array|min:1', 
            'productos.*' => 'exists:product,id', 
        ];
    }

    public function messages()
    {
        return [
            'productos.required' => 'Debes seleccionar al menos un producto.',
            'productos.*.exists' => 'Uno de los productos seleccionados no es válido.',
        ];
    }
}
