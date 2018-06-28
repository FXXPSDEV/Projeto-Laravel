<?php
namespace App\Http\Controllers;
use  App\Students;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
class Student extends Controller
{
// So pra salvar, precisa passar o curso e tal, isso ja pra dentro da enrollment por aqui, faltando authorized tambem
    
    public function index()
    {
        $student = User::all();
        return view('Students/index', ['student' => $student]);
    }
    public function create() 
    {
        return view('Students/new');
    }
    public function store(StudentRequest $request) 
    {

        $p = new User;
        $p->name = $request->name;
        $p->cpf = $request->cpf;
        $p->rg = $request->rg;
        //$p->adress = $request->adress;
        $p->phone = $request->phone;
        //$p->enrollment = $request->enrollment;
        
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
    public function update(StudentRequest $request, $id) {
        $p = Students::findOrFail($id);


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

 


// So pra salvar, precisa passar o curso e tal, isso ja pra dentro da enrollment por aqui, faltando authorized tambem
}