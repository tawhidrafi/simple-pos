<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreVariableProductRequest extends FormRequest
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
            'variants' => 'required|array',
            'variants.*.variant_name' => 'required|string|max:255',
            'variants.*.variant_code' => 'required|string|max:50|unique:variants,variant_code',
        ];
    }
}
