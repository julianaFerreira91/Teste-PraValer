<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name'         => 'required',
            'cpf'          => 'required',
            'birthdate'    => 'required',
            'email'        => 'required',
            'cellphone'    => 'required',
            'address'      => 'required',
            'number'       => 'required',
            'neighborhood' => 'required',
            'city'         => 'required',
            'state'        => 'required|max:2',
            'status'       => 'required',
            'course_id'    => 'required'
        ];
    }

    public function message()
    {
        return [
            'name.required'         => 'O campo nome é obrigatório.',
            'cpf.required'          => 'O campo cpf é obrigatório.',
            'birthdate.required'    => 'O campo data de nascimento é obrigatório.',
            'email.required'        => 'O campo e-mail é obrigatório.',
            'cellphone.required'    => 'O campo celular é obrigatório.',
            'address.required'      => 'O campo endereço é obrigatório.',
            'number.required'       => 'O campo número é obrigatório.',
            'neighborhood.required' => 'O campo bairro é obrigatório.',
            'city.required'         => 'O campo cidade é obrigatório.',
            'state.required'        => 'O campo uf é obrigatório.',
            'state.max'             => 'O campo uf deve conter no máximo 2 caracteres.',
            'status.required'       => 'O campo status é obrigatório.',
            'course_id.required'    => 'O campo curso é obrigatório.'
        ];
    }
}
