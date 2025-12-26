<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
            'photo' => 'image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'required|string|min:8',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required.',
            'address.required' => 'Address is required.',
            'phone.required' => 'Phone number is required.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Password is required.',
        ];
    }
}
