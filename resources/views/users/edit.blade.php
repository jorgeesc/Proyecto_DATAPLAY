@extends('layouts.admin')
@section('content')
@if( \Auth::user()->rol_id== 2 )
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-info mb-3" style="max-width: 65rem;">
                <legend class="card header text-white bg-info mb-2 text-center">{{ __('Actualización de usuario') }}</legend>
                    <div class="card-body text-info">
                        <a href="{{URL::to('users')}}"> Regresar</a><br><br>
                            {{HTML::ul($errors->all())}}

                            {{ Form::model( $modelo, array('route' => array('users.update', $modelo->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data') ) }}
                        <fieldset>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-left"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('name', 'Nombre del usuario') }}
                                    {{ Form::text('name', Request::old('name'),
                                        array('class' => 'form-control', 'required'=>true, 'maxlength'=> 30)) }}
                                </div>    
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-center"><i class="fa fa-key bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('password', 'Contraseña') }}
                                    {{ Form::input('password', 'password', '********', array('class' => 'form-control')) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-center"><i class="fa fa-envelope-open-text bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('email', 'Correo') }} <br>
                                    {{ Form::text('email', Request::old('email'),
                                        array('class' => 'form-control', 'required'=>true, 
                                        'maxlength'=> 50)) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-center"><i class="fa fa-user-tag bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('rol_id', 'Rol') }}
                                    {{ Form::text('rol_id', $modelo->rol_id, Request::old('rol_id'),  
                                        array('class' => 'form-control')) }}
                                </div>
                            </div><br><br>
                            <div class="form-group">
                                <div class="col-md-12 text-left">
                                    {{Form::submit('Actualizar usuario',["class"=>"btn btn-success"])}}
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
@else
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-info mb-3" style="max-width: 65rem;">
                <legend class="card header text-white bg-info mb-2 text-center">{{ __('Actualización de usuario') }}</legend>
                    <div class="card-body text-info">
                        <a href="{{URL::to('users')}}"> Regresar</a><br><br>
                            {{HTML::ul($errors->all())}}

                            {{ Form::model( $modelo, array('route' => array('users.update', $modelo->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data') ) }}
                        <fieldset>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-left"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('name', 'Nombre del usuario') }}
                                    {{ Form::text('name', Request::old('name'),
                                        array('class' => 'form-control', 'required'=>true, 'maxlength'=> 30)) }}
                                </div>    
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-center"><i class="fa fa-key bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('password', 'Contraseña') }}
                                    {{ Form::input('password', 'password', '********', array('class' => 'form-control')) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-center"><i class="fa fa-envelope-open-text bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('email', 'Correo') }} <br>
                                    {{ Form::text('email', Request::old('email'),
                                        array('class' => 'form-control', 'required'=>true, 
                                        'maxlength'=> 50)) }}
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <div class="col-md-12 text-left">
                                    {{Form::submit('Actualizar usuario',["class"=>"btn btn-success"])}}
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

@endif
@endsection