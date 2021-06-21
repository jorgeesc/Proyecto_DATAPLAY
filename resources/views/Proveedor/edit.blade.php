@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Proveedor') }}</div>
<div class="card-body">

<a href="{{ route('Proveedor.show', $modelo->id) }}">Regresar</a> <br> <br>

<h5>Formulario de actualización</h5>

{{ HTML::ul($errors->all()) }}

{{ Form::model( $modelo, array('route' => array('Proveedor.update', $modelo->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data' ) ) }}


<div class="row">

    <div class="form-group col-md-4">
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', null, 
           array('class' => 'form-control', 'required'=>true)) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('imagen', 'Imagen')}} <br>
        {{ Form::file('imagen', ['accept'=>"image/x-png,image/gif,image/jpeg"]) }} <br>
    </div>

</div>


    {{ Form::submit('Actualizar Proveedor', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
                </div>
        </div>
    </div>
</div>

@endsection