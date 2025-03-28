<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fullname'=> 'required|min:6|max:50',
            'email' => 'required|unique:users|min:9|max:150|regex:/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i',
            'password' => 'required|min:8|max:16|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d){1,}(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]{8,16}$/'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
{
    return [
        'fullname.max' => 'Full name is too long',
        'fullname.min' => 'Full name is too short',
        'email.min' => 'Email is too short',
        'email.regex' => 'Email is not valid',
        'password.regex' => 'Password is not valid',
    ];
}
}
