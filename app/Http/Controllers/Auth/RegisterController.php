<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\StudentRequest;


class RegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'type' => User::DEFAULT_TYPE, 
            'cpf' => 'required|string|max:255',
            'rg' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */


    public function index()
    {
        $student = Students::all();
        return view('Students/index', ['student' => $student]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => User::DEFAULT_TYPE,
            'cpf' => $data['cpf'],
            'rg' => $data['rg'],
            'phone' => $data['phone'],
            
        ]);
    }



    
    /*public function create() 
    {
        return view('Students/new');
    }*/
    public function store(StudentRequest $request) 
    {

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

 


}
