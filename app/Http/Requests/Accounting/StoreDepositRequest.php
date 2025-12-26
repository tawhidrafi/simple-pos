<?php

namespace App\Http\Requests\Accounting;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepositRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string',
            'account_id' => 'exists:accounts,id',
            'payment_method_id' => 'exists:payment_methods,id',
            'ref' => 'numeric|unique:deposits',
            'amount' => 'numeric',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'detail' => 'nullable|string',
        ];
    }
}
