@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Estudantes
                    <a href="/Students/create" class="float-right btn btn-success">Nova Estudante</a>
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
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>RG</th>
                            <th>Endereço</th>
                            <th>Telefone</th>
                            <th>Inscrição</th>
                            <th>Ações</th>
                        </tr>
                        
                        @foreach($student as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->cpf }}</td>
                                <td>{{ $p->rg }}</td>
                                <td>{{ $p->adress }}</td>
                                <td>{{ $p->phone }}</td>
                                <td>{{ $p->enrollment }}</td>
                                <td>
                                    <a href="/student/{{ $p->id }}/edit" class="btn btn-warning">Editar</a>

                                    {!! Form::open(['url' => "/student/$p->id", 'method' => 'delete']) !!}
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
