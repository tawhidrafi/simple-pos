<?php

namespace App\Http\Requests\Purchase;

use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseReturnRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'purchase_id' => 'exists:purchases,id',
            'products' => 'array|min:1',
            'products.*.product_code' => 'string',
            'products.*.unit_cost' => 'numeric|min:0',
            'products.*.product_qty' => 'numeric|min:1',
            'products.*.subtotal' => 'numeric|min:1',
            'total' => 'numeric|min:0',
            'status' => 'string',
            'created_by' => 'exists:users,id'
        ];
    }
}
