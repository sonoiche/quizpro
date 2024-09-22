<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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
            'name'          => 'required|unique:sections,name,'.(($id) ? $id : null).',id',
            'college_year'  => 'required',
            'status'        => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The section name field is required.',
        ];
    }
}
