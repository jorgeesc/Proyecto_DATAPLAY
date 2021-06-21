
@extends('layouts.admin')
@section('content')

    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-info mb-3" style="max-width: 65rem; , max-heigth: 60rem;">
                <legend class="card header text-white bg-info mb-2 text-center">{{ __('Creación de Roles') }}</legend>
                    <div class="card-body text-info">
                        <a href="{{URL::to('Roles')}}"> Regresar</a><br><br>
                            {{HTML::ul($errors->all())}}

                            {{Form::open(['url'=> 'Roles'])}}
                        <fieldset><br>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-left"><i class="fa fa-user-tag bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('nombre', 'Nombre del rol') }}
                                    {{ Form::text('nombre', Request::old('nombre'),
                                        array('class' => 'form-control', 'required'=>true, 'maxlength'=> 30)) }}
                                </div>    
                            </div><br>
                            <div class="form-group">
                                <div class="col-md-12 text-left">
                                    {{Form::submit('Registrar rol',["class"=>"btn btn-success"])}}<br><br>
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
