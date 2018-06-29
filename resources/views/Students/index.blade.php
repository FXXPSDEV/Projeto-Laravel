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
                            <h4>Estudantes</h4> 
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
                                <div class="row">
                                    <div class="col-sm-3">
                                    {!! Form::open(['url' => "/Students/$p->id", 'method' => 'put']) !!}
                                        {{ Form::submit('Admin',['class' => 'btn btn-sm btn-warning']) }}
                                    {!! Form::close() !!}
                                    </div>
                                    <div class="col-md-3">
                                    {!! Form::open(['url' => "/Students/$p->id", 'method' => 'delete']) !!}
                                        {{ Form::submit('Deletar',['class' => 'btn btn-sm btn-danger']) }}
                                    {!! Form::close() !!}
                                    </div>
                                </div>
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

