<?php

namespace App\Http\Requests\Purchase;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'supplier_id' => 'exists:suppliers,id',
            'products' => 'array|min:1',
            'products.*.product_code' => 'string',
            'products.*.unit_cost' => 'numeric|min:0',
            'products.*.product_qty' => 'numeric|min:1',
            'products.*.subtotal' => 'numeric|min:1',
            'delivery_status' => 'string',
            'total' => 'numeric|min:0',
            'paid_amount' => 'numeric|min:0',
            'created_by' => 'exists:users,id'
        ];
    }
}
