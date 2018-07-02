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
                            <h4>Novo Curso</h4> 
                        </div>
                    </div>                      
                @stop
                <div class="card-header">
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => '/Courses', 'method' => 'post']) !!}
                        <br>  <br>
                     <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}"> 
                         {{ Form::label('namess', 'Nome', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        {{ Form::text('name',null,['class' => 'col-sm-9 col-form-label col-form-label-sm']) }}
                        @if($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif

                        </br></br>
                    </div>
                <div class="form-group {{ $errors->has('ement') ? 'has-error' : '' }}"> 
                         {{ Form::label('emetsss', 'Ementa', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        {{ Form::text('ement',null,['class' => 'col-sm-9 col-form-label col-form-label-sm']) }}
                    @if($errors->has('ement'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ement') }}</strong>
                                </span>
                            @endif

                        </br></br>
                    </div>
                <div class="form-group {{ $errors->has('max_students') ? 'has-error' : '' }}"> 
                         {{ Form::label('max', 'Qtd. Estudantes', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        {{ Form::text('max_students',null,['class' => 'col-sm-9 col-form-label col-form-label-sm']) }}

                      @if($errors->has('max_students'))
                                <span class="help-block">
                                    <strong> {{ $errors->first('max_students') }}</strong>
                                </span>
                            @endif

                        </br></br>
                    </div>

                    <div class="text-center">
                        {{ Form::submit('Salvar',['class' => 'btn btn-success']) }}
                        
                     </div>
                   
                    {!! Form::close() !!}
                     <br>
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

