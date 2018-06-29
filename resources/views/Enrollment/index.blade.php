@extends('adminlte::page')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card box box-primary">

                @section('content_header')
                    <div class="row">
                
                        <div class="col-md-4">
                            <h4>Controle de Matriculas</h4> 
                        </div>
                        <div class="col-md-7">                    
                            <a href="/Enrollment/create" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Matricule-se</a>
                        </div>
                    </div>                      
                @stop
                <div class="card-header">
         
                </br>                
                 
                </div>

                <div class="card-body">
                   
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Curso</th>
                            <th>Estudante</th>
                            <th>Autorização</th>
                            @if(Auth::user()->type == 'admin')
                            <th>Ações</th>
                            @endif
                        </tr>
                        
                        @foreach($enrollments as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $courses->find($p->course_id)->name }}</td>
                                <td>{{ $users->find($p->student_id)->name }}</td>
                                <td>{{ $p->authorized }}</td>
                                @if(Auth::user()->type == 'admin')
                                <td>
                                @if($p->authorized == 'Desativado')
                                    {!! Form::open(['url' => "/Enrollment/$p->id", 'method' => 'put']) !!}
                                        {{ Form::submit('Ativar',['class' => 'btn btn-sm btn-warning']) }}
                                    {!! Form::close() !!}
                                @endif
                                @if($p->authorized == 'Ativado')
                                    {!! Form::open(['url' => "/Enrollment/$p->id", 'method' => 'delete']) !!}
                                        {{ Form::submit('Desativar',['class' => 'btn btn-sm btn-danger']) }}
                                    {!! Form::close() !!}
                                @endif
                                @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
