<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'sku' => 'required',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'sale_price' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'quantity' => 'required|integer|min:1',
            'weight' => 'nullable|numeric|min:0',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'categories' => 'nullable|array|min:1',
            'categories.*' => 'exists:categories,id' 
        ];
    }
}
