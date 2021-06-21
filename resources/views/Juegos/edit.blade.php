@extends('layouts.admin')
@section('content')

    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-info mb-3" style="max-width: 65rem;">
                <legend class="card header text-white bg-info mb-2 text-center">{{ __('Actualización de Juegos') }}</legend>
                    <div class="card-body text-info">
                        <a href="{{ route('Juegos.show', $modelo->id) }}"> Regresar</a><br><br>
                            {{HTML::ul($errors->all())}}

                            {{ Form::model( $modelo, array('route' => array('Juegos.update', $modelo->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data') ) }}
                        <fieldset>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-left"><i class="fa fa-gamepad bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('nombre', 'Nombre del juego') }}
                                    {{ Form::text('nombre', Request::old('nombre'),
                                        array('class' => 'form-control', 'required'=>true, 'maxlength'=> 30)) }}
                                </div>    
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-center"><i class="fa fa-comment-dots bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('descripcion', 'Descripción del Juego') }} <br>
                                    {{ Form::textArea('descripcion', Request::old('descripcion'),
                                        array('class' => 'form-control', 'required'=>true, 'maxlength'=> 200, 'rows'=>2)) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-center"><i class="fa fa-tags bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('precio', 'Precio') }}
                                    {{ Form::number('precio', Request::old('precio'), 
                                        array('class' => 'form-control', 'required'=>true, 'step'=>'.01')) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-center"><i class="fa fa-archive bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('stock', 'Existencias') }}
                                    {{ Form::number('stock', Request::old('stock'), 
                                        array('class' => 'form-control', 'required'=>true)) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-center"><i class="fa fa-info-circle bigicon"></i></span>
                                <div class="col-md-1">
                                    {{ Form::label('status', 'Estatus') }}
                                    {{ Form::checkbox('status', Request::old('status'), false,  
                                        array('class' => 'form-control')) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-center"><i class="fa fa-images bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('imagen', 'Imagen')}} <br>
                                    {{ Form::file('imagen', ['accept'=>"image/x-png,image/gif,image/jpeg"]) }}<br>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-center"><i class="fa fa-genderless bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('genero_id', 'Género del Juego') }}
                                    {{ Form::select('genero_id', $tableJuegos, Request::old('genero_id'),  
                                        array('class' => 'form-control')) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-center"><i class="fa fa-copyright bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('proveedor_id', 'Proveedor del Juego') }}
                                    {{ Form::select('proveedor_id', $tableJuegosP, Request::old('proveedor_id'),  
                                        array('class' => 'form-control')) }}
                                </div>
                            </div>            
                            <div class="form-group">
                                <div class="col-md-12 text-left">
                                    {{ Form::submit('Actualizar Juego', ['class' => 'btn btn-success'] ) }}
                                    <div class="modal" tabindex="-1" role="dialog">
                                    {{Form::close()}}
                                </div>
                            </div>
                        </fieldset>
            </div>
        </div>
    </div>
</div>

@endsection