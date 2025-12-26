<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreStandardProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:products,code',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'unit_id' => 'required|exists:units,id',
            'tax' => 'numeric',
            'tax_type' => 'required|in:inclusive,exclusive',
            'discount' => 'numeric',
            'commission_rate' => 'numeric',
            'created_by' => 'exists:users,id',
        ];
    }
}
