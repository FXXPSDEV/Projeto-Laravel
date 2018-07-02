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
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation'=> 'required',
            'type' => User::DEFAULT_TYPE, 
            'cpf' => 'required|string|max:255|unique:users',
            'rg' => 'required|string|max:255|unique:users',
            'phone' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
            
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Por favor, preencha seu nome',
            'name.max'=> 'Número máximo de caracteres atingido',
            'name.unique'=>'O nome já está cadastrado em nosso sistema',

            'cpf.unique'=>'O CPF já está cadastrado em nosso sistema',
            'cpf.required'  => 'Por favor,preencha seu CPF',
        


            'rg.unique'=>'O RG já está cadastrado em nosso sistema',
            'rg.required'  => 'Por favor,preencha seu RG',

          
            'phone.unique'=>'O telefone já está cadastrado em nosso sistema',
            'phone.required'  => 'Por favor,preencha seu telefone',

            'adress.required'  => 'Por favor,preencha seu endereço',
            'adress.max'  => 'Limite de caracteres atingido',
            
            'email.required'  => 'Por favor,preencha seu email',
            'email.unique'  => 'O email já esta cadastrado em nosso sistema',

            'password.required'  => 'Por favor,insira sua senha',
            'password.confired'  => 'Por favor,redigite sua senha',
            'password.min'  => 'A senha deve conter pelo menos 6 caractéres',
            'password_confirmation.required'  => 'Por favor,confirme sua senha',
            

            'phone.required'  => 'Por favor,preencha seu telefone',

        ];
    }
}
