<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest
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
            'fullname'=> 'required|string|min:6|max:50',
            'email' => 'required|string|unique:users|min:9|max:150|regex:/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i',
            'password' => 'required|string|min:8|max:16|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d){1,}(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]{8,16}$/'
        ];
    }
}
