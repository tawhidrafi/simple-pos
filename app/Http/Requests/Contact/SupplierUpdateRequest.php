<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class SupplierUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $supplierId = $this->route('supplier');

        return [
            'name' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:suppliers,email,' . $supplierId,
            'phone' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:255',
            'tin' => 'nullable|numeric|unique:suppliers,email,' . $supplierId,
            'address' => 'nullable|string|max:255',
        ];
    }
}
