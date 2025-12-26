<?php

namespace App\Http\Requests\Sale;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_id' => 'exists:customers,id',
            'products' => 'array|min:1',
            'products.*.product_code' => 'string',
            'products.*.unit_price' => 'numeric|min:0',
            'products.*.product_qty' => 'numeric|min:1',
            'products.*.subtotal' => 'numeric|min:1',
            'delivery_status' => 'string',
            'total' => 'numeric|min:0',
            'created_by' => 'exists:users,id'
        ];
    }
}
