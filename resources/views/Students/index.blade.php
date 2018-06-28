@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Estudantes</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

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
                            <th>Permissão</th>
                            <th>Telefone</th>
                            <th>Inscrição</th>
                            @if(Auth::user()->type == "admin")
                            <th>Ações</th>
                            @endif
                        </tr>
                        
                        @foreach($student as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->cpf }}</td>
                                <td>{{ $p->rg }}</td>
                                <td>{{ $p->type }}</td>
                                <td>{{ $p->phone }}</td>
                                <td>{{ $p->name }}</td>
                                @if(Auth::user()->type == "admin")
                                <td>
                                    <a href="/Students/{{ $p->id }}/edit" class="btn btn-warning">Editar</a>

                                    {!! Form::open(['url' => "/Students/$p->id", 'method' => 'delete']) !!}
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

