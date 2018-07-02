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
            'name'=> 'required|max:60|unique:users',
            'phone'=> 'nullable|celular_com_ddd|unique:users',
            'adress'=> 'required|max:255',
            'cpf'=> 'required|cpf|unique:users',
            'rg'=> 'required|unique:users'

            
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Por favor, preencha seu nome',
            'name.max'=> 'Número máximo de caracteres atingido',
            'name.unique'=>'O nome já está cadastrado em nosso sistema',

            'cpf.cpf'  => 'CPF Inválido',
            'cpf.unique'=>'O CPF já está cadastrado em nosso sistema',
            'cpf.required'  => 'Por favor,preencha seu CPF',

            'rg.max'  => 'RG Inválido',
            'rg.unique'=>'O RG já está cadastrado em nosso sistema',
            'rg.required'  => 'Por favor,preencha seu RG',

            'phone.celular_com_ddd'=>'Número Inválido',
            'phone.unique'=>'O telefone já está cadastrado em nosso sistema',

            'adress.required'  => 'Por favor,preencha seu endereço',

        ];
    }
}
