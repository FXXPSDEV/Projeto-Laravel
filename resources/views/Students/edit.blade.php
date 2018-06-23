@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Editar Estudante           
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(['url' => '/Students', 'method' => 'post']) !!}
                        
                    {{ Form::label('nameS', 'Nome', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                    {{ Form::text('name',null,['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}

                    </br></br>
                

                    {{ Form::label('cpfs', 'CPF', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                    {{ Form::text('cpf',null,['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}

                    </br></br>

                    {{ Form::label('rgs', 'RG', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                    {{ Form::text('rg',null,['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}

                     </br></br>

                    
                    {{ Form::label('adresss', 'Endereço', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                    {{ Form::text('adress',null,['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}

                    </br></br>

                    {{ Form::label('phonee', 'Telefone', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                    {{ Form::text('phone',null,['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                
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
@endsection
