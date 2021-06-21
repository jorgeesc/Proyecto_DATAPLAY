@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-20">
            <div class="card">
                <div class="card-header">{{ __('Noticias') }}</div>
<div class="card-body">

<a href="{{ route('Noticias.show', $modelo->id) }}">Regresar</a> <br> <br>

<h5>Formulario de actualización</h5>

{{ HTML::ul($errors->all()) }}

{{ Form::model( $modelo, array('route' => array('Noticias.update', $modelo->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data' ) ) }}


<div class="row">

    <div class="form-group col-md-4">
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::textArea('nombre', null, 
           array('class' => 'form-control', 'required'=>true)) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('descripcion', 'Descripcion') }}
        {{ Form::textArea('descripcion', null, 
           array('class' => 'form-control', 'required'=>true)) }}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('fuente', 'Fuente') }}
        {{ Form::text('fuente', null, 
           array('class' => 'form-control', 'required'=>true)) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('imagen', 'Imagen')}} <br>
        {{ Form::file('imagen', ['accept'=>"image/x-png,image/gif,image/jpeg"]) }} <br>
    </div>

</div>


    {{ Form::submit('Actualizar Noticia', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
                </div>
        </div>
    </div>
</div>

@endsection