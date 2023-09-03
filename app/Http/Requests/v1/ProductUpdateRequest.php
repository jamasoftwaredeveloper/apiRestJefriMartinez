<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $productId = $this->route('product');

        return [
            'name' => 'required|string|unique:products,name,' . $productId,
            'description' => 'required|string',
            'photo' => 'nullable',
            'price' => 'required|numeric|min:0',
            'iva' => 'required|numeric|min:0',
            'active' => 'required|boolean'
        ];
    }
}
