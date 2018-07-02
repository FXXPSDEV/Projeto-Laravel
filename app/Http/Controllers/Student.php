<?php
namespace App\Http\Controllers;
use  App\Students;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
class Student extends Controller
{
// So pra salvar, precisa passar o curso e tal, isso ja pra dentro da enrollment por aqui, faltando authorized tambem
    
    public function index()
    {
        $student = User::paginate(15);
        return view('Students/index', ['student' => $student]);
    }
    public function create() 
    {
        return view('Students/new');
    }
    public function show($id)
    {

        $students = Auth::user()->id;
        return view('Students.edit', ['students' => $students]);
        
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
    public function auth($id) {
        $students = User::findOrFail($id);
        return view('Students.auth', ['students' => $students]);
    }
    public function edit($id) {
        $student = User::findOrFail($id);
        return view('Students.edit', ['students' => $students]);
    }   
    public function delete($id) {
        $students = User::findOrFail($id);
        return view('Students.delete', ['students' => $students]); 
    }
    public function update(StudentRequest $request, $id) {
        $p = User::findOrFail($id);
        $p->name = $request->name;
        $p->email = $request->email;
        $p->password = $request->password;
        $p->password_confirmation = $request->password_confirmation;
        $p->cpf = $request->cpf;
        $p->rg = $request->rg;
        $p->adress = $request->adress;
        $p->phone = $request->phone;
    
        if ($p->save()) {
            \Session::flash('status', 'Perfil atualizado com sucesso.');
            return redirect('/Students');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar o perfil.');
            return view('Students.edit', ['students' => $p]);
        }
    }
    public function authorized($id) {
        $p = User::findOrFail($id);
        if(Auth::user()->type == 'admin'){
           

                if($p->type == 'admin' && $p->email != 'admin@admin.com'){
                    $p->type = User::DEFAULT_TYPE;
                }else{
                    $p->type = User::ADMIN_TYPE;
                }
                if ($p->save()) {
                    \Session::flash('status', 'Permissão alterada.');
                    return redirect('/Students');
                } else {
                    \Session::flash('status', 'Ocorreu um erro ao atualizar o matricula.');
                    return view('Student.edit', ['enrollment' => $p]);
                }
            
        }
    }
    
    public function destroy($id) {
        $p = User::findOrFail($id);
        $p->delete();
        \Session::flash('status', 'Estudante excluído com sucesso.');
        return redirect('/Students');
    }
}