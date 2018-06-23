<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Courses;

class Course extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $Course = Courses::all();
        return view('Courses/index', ['Course' => $Course]);
    }
    public function create() 
    {
        return view('Courses/new');
    }
    public function store(Request $request) 
    {
        $p = new Courses;
        $p->name = $request->input('name');
        $p->ement = $request->input('ement');
        $p->max_students = $request->input('max_students');
        
        if ($p->save()) {
            \Session::flash('status', 'Curso criado com sucesso.');
            return redirect('/Courses');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao criar o curso.');
            return view('Courses.new');
        }
    }
    public function edit($id) {
        $Course = Courses::findOrFail($id);
        return view('Courses.edit', ['Course' => $Course]);
    }
    public function delete($id) {
        $Course = Courses::findOrFail($id);
        return view('course.delete', ['course' => $Course]); 
    }
    public function update(Request $request, $id) {
        $p = Courses::findOrFail($id);
        $p->name = $request->input('name');
        $p->ement = $request->input('ement');
        $p->max_students = $request->input('max_students');
        
        if ($p->save()) {
            \Session::flash('status', 'Curso atualizado com sucesso.');
            return redirect('/Courses');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar o curso.');
            return view('Courses.edit', ['course' => $p]);
        }
    }
    public function destroy($id) {
        $p = Courses::findOrFail($id);
        $p->delete();
        \Session::flash('status', 'Curso excluído com sucesso.');
        return redirect('/Courses');
    }
}
