<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomRequest extends FormRequest
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
            'name'          => 'required',
            'section'       => 'required',
            'subject'       => 'required',
            'subject_code'  => 'required',
            'schedule'      => 'required',
            'schedule_time' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'          => 'The classroom name field is required.',
            'section.required'       => 'The classroom section field is required.'
        ];
    }
}
