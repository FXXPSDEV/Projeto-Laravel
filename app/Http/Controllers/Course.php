<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Student;

class Course extends Controller
{
    public function index()
    {
        $course = Course::all();
        return view('Courses/index', ['course' => $course]);
    }
    public function create() 
    {
        return view('Courses/new');
    }
    public function store(Request $request) 
    {
        $p = new Course;
        $p->name = $request->input('name');
        $p->ement = $request->input('ement');
        $p->max_student = $request->input('max_students');
        
        if ($p->save()) {
            \Session::flash('status', 'Curso criado com sucesso.');
            return redirect('/Courses');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao criar o curso.');
            return view('Courses.new');
        }
    }
    public function edit($id) {
        $course = Course::findOrFail($id);
        return view('Courses.edit', ['course' => $course]);
    }
    public function delete($id) {
        $course = Course::findOrFail($id);
        return view('Courses.delete', ['course' => $course]); 
    }
    public function update(Request $request, $id) {
        $p = Course::findOrFail($id);
        $p->name = $request->input('name');
        
        if ($p->save()) {
            \Session::flash('status', 'Curso atualizado com sucesso.');
            return redirect('/Courses');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar o curso.');
            return view('Courses.edit', ['course' => $p]);
        }
    }
    public function destroy($id) {
        $p = Course::findOrFail($id);
        $p->delete();
        \Session::flash('status', 'Curso excluído com sucesso.');
        return redirect('/Courses');
    }
}
