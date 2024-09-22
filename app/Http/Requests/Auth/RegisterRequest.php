<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fname'     => ['required', 'string', 'max:255'],
            'lname'     => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'terms'     => ['required']
        ];
    }

    public function messages()
    {
        return [
            'fname.required' => 'The first name field is required.',
            'lname.required' => 'The last name field is requried.',
            'terms.required' => 'The terms and conditions is required.'
        ];
    }
}
