<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required.',
            'email.email' => 'Enter a valid email.',
            'email.exists' => 'This email is not registered.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
        ];
    }
}
