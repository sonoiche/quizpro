<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
        $id = $this->input('id');
        return [
            'fname'             => 'required',
            'lname'             => 'required',
            'email'             => 'required_if:role_type,Admin|email|unique:users,email,'.(($id) ? $id : null).',id',
            'contact_number'    => 'required',
            'role'              => 'required_if:role_type,Admin',
            'password'          => 'nullable|sometimes|min:8|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'fname.required'    => 'The first name field is required.',
            'lname.required'    => 'The last name field is required.',
            'role.required_if'  => 'The role filed is required.'
        ];
    }
}
