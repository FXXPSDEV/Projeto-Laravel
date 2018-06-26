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
                        
                    {{ Form::label('name', 'Nome') }}
                        {{ Form::text('name') }}

                        <br /><br />

                        {{ Form::label('ement', 'Ementa') }}
                        {{ Form::text('ement') }}

                        <br /><br />

                        {{ Form::label('max_students', 'Qtd. Máxima') }}
                        {{ Form::text('max_students') }}

                        <br/>
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

