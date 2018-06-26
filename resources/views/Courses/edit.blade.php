@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Editar curso                 
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => "/Courses/$Course->id", 'method' => 'put']) !!}
                        
                           <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}"> 
                        {{ Form::label('namee', 'Nome') }}
                        {{ Form::text('name') }}
                        @if($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif

                        </br></br>
                    </div>
                <div class="form-group {{ $errors->has('ement') ? 'has-error' : '' }}"> 
                        {{ Form::label('ementt', 'Ementa') }}
                        {{ Form::text('ement') }}
                    @if($errors->has('ement'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ement') }}</strong>
                                </span>
                            @endif

                        </br></br>
                    </div>
                <div class="form-group {{ $errors->has('max_students') ? 'has-error' : '' }}"> 
                        {{ Form::label('max_studentss', 'Qtd. Máxima') }}
                        {{ Form::number('max_students') }}

                      @if($errors->has('max_students'))
                                <span class="help-block">
                                    <strong> {{ $errors->first('max_students') }}</strong>
                                </span>
                            @endif

                        </br></br>
                    </div>
                        {{ Form::submit('Salvar') }}

                    {!! Form::close() !!}
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

