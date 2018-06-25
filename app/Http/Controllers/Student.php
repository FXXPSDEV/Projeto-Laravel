<?php
namespace App\Http\Controllers;
use  App\Students;
use Illuminate\Http\Request;
class Student extends Controller
{

    
    public function index()
    {
        $student = Students::all();
        return view('Students/index', ['student' => $student]);
    }
    public function create() 
    {
        return view('Students/new');
    }
    public function store(Request $request) 
    {

        $rules =[

            'name'=> 'required|max:60|unique:students',
            'phone'=> '|celular_com_ddd|unique:students',
            'adress'=> 'required|max:255',
            'cpf'=> 'required|cpf|unique:students',
            'rg'=> 'required|max:11|unique:students'

        ];
        $this->validate($request,$rules);
        
       /* if ($validator->fails()) {
           // return $validator->withErrors()->all();
            return redirect('Students/create')
                        ->withErrors($validator)
                        ->withInput();

        }*/

        $p = new Students;
        $p->name = $request->name;
        $p->cpf = $request->cpf;
        $p->rg = $request->rg;
        $p->adress = $request->adress;
        $p->phone = $request->phone;
        $p->enrollment = $request->enrollment;
        
        if ($p->save()) {
            \Session::flash('status', 'Estudante cadastrado com sucesso.');
            return redirect('/Students');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao cadastrar o estudante.');
            return view('Students.new');
        }
    }
    public function edit($id) {
        $students = Students::findOrFail($id);
        return view('Students.edit', ['students' => $students]);
    }
    public function delete($id) {
        $students = Students::findOrFail($id);
        return view('Students.delete', ['students' => $students]); 
    }
    public function update(Request $request, $id) {
        $p = Students::findOrFail($id);

        
      $rules =[

            'name'=> 'required|max:60|unique:students',
            'phone'=> '|celular_com_ddd|unique:students',
            'adress'=> 'required|max:255',
            'cpf'=> 'required|cpf|unique:students',
            'rg'=> 'required|max:11|unique:students'

        ];


        $this->validate($request,$rules);

        $p->name = $request->name;
        $p->cpf = $request->cpf;
        $p->rg = $request->rg;
        $p->adress = $request->adress;
        $p->phone = $request->phone;
        $p->enrollment = $request->enrollment;
        

       
        
        if ($p->save()) {
            \Session::flash('status', 'Estudante atualizado com sucesso.');
            return redirect('/Students');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar o estudante.');
            return view('Students.edit', ['Students' => $p]);
        }
    }
    public function destroy($id) {
        $p = Students::findOrFail($id);
        $p->delete();
        \Session::flash('status', 'Estudante excluído com sucesso.');
        return redirect('/Students');
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