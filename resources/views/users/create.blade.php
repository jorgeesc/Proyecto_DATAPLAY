@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-info mb-3" style="max-width: 65rem;">
                <legend class="card header text-white bg-info mb-2 text-center">{{ __('Creación de usuario') }}</legend>
                    <div class="card-body text-info">
                        <a href="{{URL::to('users')}}"> Regresar</a><br><br>
                            {{HTML::ul($errors->all())}}

                            {{Form::open(['url'=> 'users'])}}
                        <fieldset>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-left"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
	                                {{Form::label('name','Nombre')}}
	                                {{Form::text('name',Request::old('name'),["class"=>"form-control border border-success"])}}
                                </div>    
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-center"><i class="fa fa-envelope-open-text bigicon"></i></span>
                                <div class="col-md-8">
                                    {{Form::label('email','Email')}}
	                                {{Form::text('email',Request::old('email'),["class"=>"form-control border border-success"])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-center"><i class="fa fa-key bigicon"></i></span>
                                <div class="col-md-8">
                                    {{Form::label('password','Contraseña')}}
	                                {{Form::text('password',Request::old('password'),["class"=>"form-control border border-success"])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-center"><i class="fa fa-user-tag bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('rol_id', 'Rol') }}
                                    {{ Form::select('rol_id', $tableRol, Request::old('rol_id'), 
                                        array('class' => "form-control border border-success")) }}
                                </div>
                            </div><br><br>
                            <div class="form-group">
                                <div class="col-md-12 text-left">
                                    {{Form::submit('Registrar usuario',["class"=>"btn btn-success"])}}
                                    <div class="modal" tabindex="-1" role="dialog">
                                    {{Form::close()}}
                                </div>
                            </div>
                        </fieldset>
            </div>
        </div>
    </div>
</div>
<br>
@endsection