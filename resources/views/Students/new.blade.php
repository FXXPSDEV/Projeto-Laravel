@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   Novo Estudante
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


            
                    {!! Form::open(['url' => '/Students', 'method' => 'post']) !!}
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}"> 
                        {{ Form::label('nameS', 'Nome', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        {{ Form::text('name',null,['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}

                        @if($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif

                        </br></br>
                    </div>

                    <div class="form-group {{ $errors->has('cpf') ? 'has-error' : '' }}"> 
                        {{ Form::label('cpfs', 'CPF', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        {{ Form::text('cpf',null,['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}

                        @if($errors->has('cpf'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cpf') }}</strong>
                        </span>
                         @endif
                    </div>   

                        </br></br>
                    <div class="form-group {{ $errors->has('rg') ? 'has-error' : '' }}"> 
                        {{ Form::label('rgs', 'RG', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        {{ Form::text('rg',null,['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}

                        
                        @if($errors->has('rg'))
                        <span class="help-block">
                            <strong>{{ $errors->first('rg') }}</strong>
                        </span>
                         @endif
                    </div>
                         </br></br>

                    <div class="form-group {{ $errors->has('adress') ? 'has-error' : '' }}">                         
                        {{ Form::label('adresss', 'Endereço', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        {{ Form::text('adress',null,['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}

                        
                        @if($errors->has('adress'))
                        <span class="help-block">
                            <strong>{{ $errors->first('adress') }}</strong>
                        </span>
                         @endif
                        </div>
                        </br></br>
                   

                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">              
                        {{ Form::label('phonee', 'Telefone', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        {{ Form::text('phone',null,['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}


                        @if($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                         @endif
                        </div>
                    
                        </br></br>

                        {{ Form::label('enrollmentss', 'Matricula', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        {{ Form::text('enrollment',null,['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}

                        </br></br>
                        
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

