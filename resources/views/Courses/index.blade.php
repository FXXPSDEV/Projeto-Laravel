@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Cursos</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/Courses/create" class="float-right btn btn-success">Novo Curso</a>
                   
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
                            <th>Ementa</th>
                            <th>Quantidade máxima</th>
                            @if(Auth::user()->type == "admin")
                            <th>Ações</th>
                            @endif
                        </tr>
                        
                        @foreach($Course as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->ement }}</td>
                                <td>{{ $p->max_students }}</td>
                        @if(Auth::user()->type == 'admin')
                                <td>
                                    <a href="/Courses/{{ $p->id }}/edit" class="btn btn-warning">Editar</a>

                                    {!! Form::open(['url' => "/Courses/$p->id", 'method' => 'delete']) !!}
                                        {{ Form::submit('Deletar',['class' => 'btn btn-danger']) }}
                                    {!! Form::close() !!}
                                </td>
                        @endif
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
