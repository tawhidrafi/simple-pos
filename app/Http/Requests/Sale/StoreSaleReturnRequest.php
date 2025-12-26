<?php

namespace App\Http\Requests\Sale;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaleReturnRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'sale_id' => 'exists:sales,id',
            'products' => 'array|min:1',
            'products.*.product_code' => 'string',
            'products.*.unit_price' => 'numeric|min:0',
            'products.*.product_qty' => 'numeric|min:1',
            'products.*.subtotal' => 'numeric|min:1',
            'total' => 'numeric|min:0',
            'status' => 'string',
            'created_by' => 'exists:users,id'
        ];
    }
}
