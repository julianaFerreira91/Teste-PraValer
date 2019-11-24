<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'           => 'required',
            'duration'       => 'required',
            'status'         => 'required',
            'institution_id' => 'required'
        ];
    }

    public function message()
    {
        return [
            'name.required'           => 'O campo nome é obrigatório.',
            'duration.required'       => 'O campo duração é obrigatório.',
            'status.required'         => 'O campo status é obrigatório.',
            'institution_id.required' => 'O campo instituição é obrigatório.'
        ];
    }
}
