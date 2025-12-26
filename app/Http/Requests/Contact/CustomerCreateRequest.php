<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            'email' => ['email', 'max:255', Rule::unique('customers')],
            'phone' => ['string', 'max:255', Rule::unique('customers')],
            'city' => 'string|max:255',
            'address' => 'nullable|string',
            'created_by' => 'exists:users,id',
        ];
    }
}
