@extends('adminlte::page')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card box box-primary">

                @section('content_header')
                    <div class="row">
                
                        <div class="col-md-4">
                            <h4>Cursos</h4> 
                        </div>
                        <div class="col-md-7">                    
                            @if(Auth::user()->type == "admin")
                                <a href="/Courses/create" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Novo Curso</a>
                            @endif
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
                            <th>Ementa</th>
                            <th>Quantidade máxima</th>
                            @if(Auth::user()->type == "admin")
                            <th>Ações</th>
                            @endif
                        </tr>
                        
                        @foreach($courses as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->ement }}</td>
                                <td>{{ $p->max_students }}</td>
                                
                        @if(Auth::user()->type == 'admin')
                                <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="/Courses/{{ $p->id }}/edit" class="btn btn-sm btn-warning ">Editar</a>
                                    
                                    </div>
                                <br><br>

                                    <div class="col-md-6">
                                          {!! Form::open(['url' => "/Courses/$p->id", 'method' => 'delete']) !!}
                                             {{ Form::submit('Deletar',['class' => 'btn btn-sm btn-danger ']) }}
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
           
            <div class="text-center">
                    {{ $courses->links() }}
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
