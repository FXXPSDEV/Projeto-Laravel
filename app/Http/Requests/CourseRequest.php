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
            'name'=> 'required|max:60|unique:courses',
            'ement'=> 'required|unique:courses',
            'max_students'=> 'required',
            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Por favor, preencha o nome do curso',
            'name.max'=> 'Número máximo de caracteres atingido',
            'name.unique'=>'O curso já está cadastrado em nosso sistema',
          
            'ement.required' => 'Por favor, preencha o nome do curso',
            'ement.unique'=>'Ementa já está cadastrada em nosso sistema',
            
            'max_students.required' => 'Por favor, preencha o número máximo de alunos para o curso',
            
          
        ];
    }
}
