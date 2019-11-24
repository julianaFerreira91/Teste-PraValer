<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstitutionRequest extends FormRequest
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
            'name'   => 'required',
            'cnpj'   => 'required|max:18',
            'status' => 'required'
        ];
    }

    public function message()
    {
        return [
            'name.required'   => 'O campo nome é obirgatório.',
            'cnpj.required'   => 'O campo cnpj é obirgatório.',
            'cnpj.max'        => 'O campo cnpj deve conter no máximo 18 caracteres.',
            'status.required' => 'O campo status é obirgatório.', 
        ];
    }
}
