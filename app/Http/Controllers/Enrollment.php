<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Courses;
use App\Enrollments;
use Auth;

class Enrollment extends Controller
{
    public function index()
    {
        $enrollments = Enrollments::all();
        $users = User::all();
        $courses = Courses::all();
        //dd($enrollments, $users, $courses);
        return view('Enrollment/index', compact('enrollments', 'users', 'courses'));
    }

    public function create() 
    {
       
        $enrollments = Enrollments::where('student_id',Auth::user()->id)->get();
        $courses_out = [];
        foreach($enrollments as $enroll){
           
            array_push($courses_out,$enroll->course_id);
            
        }
        $courses = Courses::whereNotIn('id',$courses_out)->get();

        return view('Enrollment/create', compact('courses'));
    }

    public function store(Request $request) 
    {
      
        $p = new Enrollments;
        $p->course_id = $request->input('course_id');
        $p->student_id = Auth::user()->id;
        $p->authorized = User::AUTHORIZED;
        
        if ($p->save()) {
            \Session::flash('status', 'Matricula cadastrado com sucesso.');
            return redirect('/Enrollment');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao cadastrar a matricula.');
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
        $p = Enrollments::findOrFail($id);
        $p->authorized = User::AUTHORIZEDED;
        
        if ($p->save()) {
            \Session::flash('status', 'Matricula atualizado com sucesso.');
            return redirect('/Enrollment');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar o matricula.');
            return view('Enrollment.edit', ['enrollment' => $p]);
        }
    }
    
    public function destroy($id) {
        $p = Enrollments::findOrFail($id);
        $p->authorized = User::AUTHORIZED;
        if ($p->save()) {
            \Session::flash('status', 'Matricula excluído com sucesso.');
            return redirect('/Enrollment');
        }
        
    }

}
