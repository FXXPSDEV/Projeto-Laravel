<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Students;
use App\Courses;
use App\Enrollments;

class Enrollment extends Controller
{
    public function index()
    {
        $enrollment = Enrollments::all();

    
        $enrollment = DB::table('enrollment')
        ->join('enrollment', 'enrollment.course_id', '=', 'courses.id')
        ->join('enrollment','enrollment.student_id','=','students.id')
        ->select('students.id','students.name' ,'students.enrollment', 'courses.id','courses.name','course.max_students')
        ->get();
        return view('Enrollment/index', ['enrollment' => $enrollment]);


    }
    public function create() 
    {
        return view('Enrollment/new');
    }
    public function store(Request $request) 
    {
        $p = new Enrollments;
        $p->course_id = $request->input('course_id');
        $p->student_id = $request->input('student_id');
        $p->authorized = $request->input('authorized');
        
        if ($p->save()) {
            \Session::flash('status', 'Estudante cadastrado com sucesso.');
            return redirect('/Enrollment');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao cadastrar o estudante.');
            return view('Enrollment.new');
        }
    }
    public function edit($id) {
        $enrollment = Enrollments::findOrFail($id);
        return view('Enrollment.edit', ['enrollment' => $enrollment]);
    }
    public function delete($id) {
        $enrollment = Enrollments::findOrFail($id);
        return view('Enrollment.delete', ['enrollment' => $enrollment]); 
    }
    public function update(Request $request, $id) {
        $p = Enrollment::findOrFail($id);
        $p->course_id = $request->input('course_id');
        $p->student_id = $request->input('student_id');
        $p->authorized = $request->input('authorized');
        
        if ($p->save()) {
            \Session::flash('status', 'Estudante atualizado com sucesso.');
            return redirect('/Enrollment');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar o estudante.');
            return view('Enrollment.edit', ['enrollment' => $p]);
        }
    }
    public function destroy($id) {
        $p = Enrollments::findOrFail($id);
        $p->delete();
        \Session::flash('status', 'Estudante excluído com sucesso.');
        return redirect('/Enrollment');
    }
}
