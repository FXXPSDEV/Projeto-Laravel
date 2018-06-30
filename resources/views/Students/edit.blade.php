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
                            <h4>Editar Perfil</h4> 
                        </div>
                    </div>                      
                @stop

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(['url' => "/Students/$students", 'method' => 'put']) !!}
                        
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}"> 
                        {{ Form::label('namess', 'Nome', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                       {{ Form::text('name',Auth::user()->name,['class' => 'col-sm-9 col-form-label col-form-label-sm']) }}
                       @if($errors->has('name'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('name') }}</strong>
                               </span>
                           @endif

                       </br></br>
                   </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}"> 
                        {{ Form::label('emaill', 'Email', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        {{ Form::text('email',Auth::user()->email,['class' => 'col-sm-9 col-form-label col-form-label-sm']) }}

                        @if($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif

                        </br></br>
                    </div>

                    <div class="form-group {{ $errors->has('cpf') ? 'has-error' : '' }}"> 
                        {{ Form::label('cpfs', 'CPF', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        {{ Form::text('cpf',Auth::user()->cpf,['class' => 'col-sm-9 col-form-label col-form-label-sm']) }}

                        @if($errors->has('cpf'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cpf') }}</strong>
                        </span>
                         @endif
                    </div>   

                        </br></br>
                    <div class="form-group {{ $errors->has('rg') ? 'has-error' : '' }}"> 
                        {{ Form::label('rgs', 'RG', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        {{ Form::text('rg',Auth::user()->rg,['class' => 'col-sm-9 col-form-label col-form-label-sm']) }}

                        
                        @if($errors->has('rg'))
                        <span class="help-block">
                            <strong>{{ $errors->first('rg') }}</strong>
                        </span>
                         @endif
                    </div>
                         </br></br>

                    <div class="form-group {{ $errors->has('adress') ? 'has-error' : '' }}">                         
                        {{ Form::label('adresss', 'Endereço', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        {{ Form::text('adress',Auth::user()->adress,['class' => 'col-sm-9 col-form-label col-form-label-sm']) }}

                        
                        @if($errors->has('adress'))
                        <span class="help-block">
                            <strong>{{ $errors->first('adress') }}</strong>
                        </span>
                         @endif
                        </div>
                        </br></br>
                   

                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">              
                        {{ Form::label('phonee', 'Telefone', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        {{ Form::text('phone',Auth::user()->phone,['class' => 'col-sm-9 col-form-label col-form-label-sm']) }}


                        @if($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                         @endif
                        </div>
                    
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

