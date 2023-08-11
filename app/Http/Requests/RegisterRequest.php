<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRules;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required',
                'confirmed',
                PasswordRules::min(8)
                //PasswordRules::min(8)->numbers()->letters()->symbols()
            ]
        ];
    }

    //For modified messages errors
    /*public function messages()
    {
        return [
            'name' => 'The name pls',
            'email.email' => 'The email dont valid',
            'email.required' => 'The email pls',
            'email.required' => 'The email already registered',
        ];
    }*/
}
