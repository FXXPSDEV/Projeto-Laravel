@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Curso
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
                            <th>Ações</th>
                        </tr>
                        
                        @foreach($Course as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->ement }}</td>
                                <td>{{ $p->max_students }}</td>

                                <td>
                                    <a href="/Courses/{{ $p->id }}/edit" class="btn btn-warning">Editar</a>

                                    {!! Form::open(['url' => "/Courses/$p->id", 'method' => 'delete']) !!}
                                        {{ Form::submit('Deletar',['class' => 'btn btn-danger']) }}
                                    {!! Form::close() !!}
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
