@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Matricular-se</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => '/Enrollment', 'method' => 'post']) !!}

                        <div class="form-group {{ $errors->has('course_id') ? 'has-error' : '' }}"> 
                            <div class="form-group">
                            <label>Curso</label>
                            <select class="form-control" name="course_id">
                            @if(count($courses) == 0)
                                <option value="0">--- Não há cursos disponíveis para você ---</option>
                            @else
                            
                            <option value="0" selected>--- Selecione o curso ---</option>
                            @foreach($courses as $course)
                                        
                                <option value="{{$course->id}}">{{$course->name}}</option>
                                    
                             @endforeach
                            @endif
                            
                            </select>
                            </div>
                                @if($errors->has('course_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('course_id') }}</strong>
                                    </span>
                                @endif

                                </br></br>
                            </div>

                        {{ Form::submit('Cadastrar') }}

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

