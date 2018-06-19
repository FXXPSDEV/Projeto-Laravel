<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\students;


class Student extends Controller
{
    public function index()
    {
        $student = Student::all();
        return view('Students/index', ['student' => $students]);
    }
    public function create() 
    {
        return view('Students/new');
    }
    public function store(Request $request) 
    {
        $p = new students;
        $p->name = $request->input('name');
        $p->cpf = $request->input('cpf');
        $p->rg = $request->input('rg');
        $p->adress = $request->input('adress');
        $p->phone = $request->input('phone');
        $p->enrollment = $request->input('enrollment');
        
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
        $p->name = $request->input('name');
        $p->cpf = $request->input('cpf');
        $p->rg = $request->input('rg');
        $p->adress = $request->input('adress');
        $p->phone = $request->input('phone');
        $p->enrollment = $request->input('enrollment');
        
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
