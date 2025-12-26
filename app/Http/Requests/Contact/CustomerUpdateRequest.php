<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $customerId = $this->route('customer');
        return [
            'name' => 'string',
            'email' => 'email|unique:customers,email,' . $customerId . ',id',
            'phone' => 'string|unique:customers,phone,' . $customerId . ',id',
            'address' => 'string',
            'city' => 'string',
        ];
    }
}
