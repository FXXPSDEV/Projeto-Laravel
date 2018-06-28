@extends('adminlte::page')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                @section('content_header')
                    <h1>Controle de Matriculas</h1>
                @stop
                <div class="card-header float-right">
         
                </br>                
                 
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Curso</th>
                            <th>Estudante</th>
                            <th>Autorização</th>
                            <th>Ações</th>
                        </tr>
                        
                        @foreach($enrollment as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->course_id }}</td>
                                <td>{{ $p->student_id }}</td>
                                <td>{{ $p->authorized }}</td>
                                <td>
                                    {!! Form::open(['url' => "/enrollment/$p->id", 'method' => 'authorize']) !!}
                                    {{ Form::submit('Autorizar',['class' => 'btn btn-warning']) }}

                                     {!! Form::open(['url' => "/enrollment/$p->id", 'method' => 'delete']) !!}
                                        {{ Form::submit('Deletar',['class' => 'btn btn-danger']) }}
                                    {!! Form::close() !!}-->
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
