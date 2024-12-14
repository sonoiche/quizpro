<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
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
        $college_year = $this->input('college_year');
        return [
            'name'          => [
                'required',
                Rule::unique('sections')->where(function ($query) use ($college_year) {
                    return $query->where('college_year', $college_year);
                })->ignore($id),
            ],
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
