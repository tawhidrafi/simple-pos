<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SupplierCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            'email' => ['email', 'max:255', Rule::unique('suppliers')],
            'phone' => ['string', 'max:255', Rule::unique('suppliers')],
            'city' => 'string|max:255',
            'address' => 'nullable|string',
            'company' => 'string|max:255',
            'tin' => ['nullable', 'numeric', Rule::unique('suppliers')],
            'created_by' => 'exists:users,id',
        ];
    }
}
