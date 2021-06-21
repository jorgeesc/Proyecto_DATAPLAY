@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Noticias') }}</div>
<div class="card-body">


<a href="{{route('Noticias.index')}}">Inicio</a> <br><br>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Información de Noticias</th>
            <th>
                {{ Form::open(array('url' => route('Noticias.destroy', $modelo->id), 'class' => 'pull-right')) }}
                    <a class="btn btn-primary" href="{{route('Noticias.edit', $modelo->id)}}">Editar</a>
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Borrar', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </th>
        </tr>
    </thead>
    <tbody>
        <tr><td>''Título</td><td>{{$modelo->nombre}}</td></tr>
            <tr><td> Descripcion de la Noticia </td> <td>{{$modelo->descripcion}}</td></tr>
        <tr><td> Fuente </td> <td>{{$modelo->fuente}}</td></tr>
            <tr><td> Fecha de registro </td> <td>{{$modelo->created_at}}</td></tr>
            <tr><td> Fecha de modificación </td> <td>{{$modelo->updated_at}}</td></tr>
    </tbody>

</table>
</div>
                </div>
        </div>
    </div>
</div>

@endsection