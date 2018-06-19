<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Course extends Controller
{
    public function index()
    {
        $State = State::all();
        return view('course/index', ['course' => $Course]);
    }
    public function create() 
    {
        return view('course/new');
    }
    public function store(Request $request) 
    {
        $p = new Course;
        $p->name = $request->input('nome');
        $p->ement = $request->input('ement');
        $p->max_student = $request->input('max_student');
        
        if ($p->save()) {
            \Session::flash('status', 'Curso criado com sucesso.');
            return redirect('/course');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao criar o curso.');
            return view('course.new');
        }
    }
    public function edit($id) {
        $Course = Course::findOrFail($id);
        return view('course.edit', ['course' => $Course]);
    }
    public function delete($id) {
        $Course = Course::findOrFail($id);
        return view('course.delete', ['course' => $Course]); 
    }
    public function update(Request $request, $id) {
        $p = Course::findOrFail($id);
        $p->name = $request->input('nome');
        
        if ($p->save()) {
            \Session::flash('status', 'Curso atualizado com sucesso.');
            return redirect('/course');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar o curso.');
            return view('course.edit', ['course' => $p]);
        }
    }
    public function destroy($id) {
        $p = Course::findOrFail($id);
        $p->delete();
        \Session::flash('status', 'Curso excluído com sucesso.');
        return redirect('/course');
    }
}
