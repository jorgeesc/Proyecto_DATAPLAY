@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Género') }}</div>
<div class="card-body">


<a href="{{ URL::to('Genero') }}">Regresar</a> <br> <br>

<h5>Formulario de creación</h5>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'Genero', 'enctype' => 'multipart/form-data')) }}

<div class="row">

<div class="form-group col-md-4">
        {{ Form::label('nombre', 'Nombre de género') }}
        {{ Form::text('nombre', Request::old('nombre'),
           array('class' => 'form-control', 'required'=>true, 'maxlength'=> 30)) }}
    </div>

    <div class="form-group col-md-4">
{{ Form::label('imagen', 'Imagen')}} <br>
{{ Form::file('imagen', ['accept'=>"image/x-png,image/gif,image/jpeg"]) }} <br>
</div>

</div>

    {{ Form::submit('Registrar Género', ['class' => 'btn btn-primary'] ) }}

{{ Form::close() }}
</div>
                </div>
        </div>
    </div>
</div>

@endsection
