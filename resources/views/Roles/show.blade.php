@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-info mb-3" style="max-width: 65rem; , max-heigth: 60rem;">
                <legend class="card header text-white bg-info mb-2 text-center">{{ __('Roles') }}</legend>
                    <div class="card-body text-info">
                        <a href="{{route('Roles.index')}}"> Regresar</a><br><br>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Información del Rol</th><br><br>
            <th>
                {{ Form::open(array('url' => route('Roles.destroy', $modelo->id), 'class' => 'pull-right')) }}
                    <a class="btn btn-primary" href="{{route('Roles.edit', $modelo->id)}}">Editar</a>
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Borrar', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </th>
        </tr>
    </thead>
    <tbody>
            <tr><td> Categoría</td> <td>{{$modelo->nombre}}</td></tr>         
            <tr><td> Fecha de registro </td> <td>{{$modelo->created_at}}</td></tr>
            <tr><td> Fecha de modificación </td> <td>{{$modelo->updated_at}}</td></tr>
    </tbody>

</table>
</div>
        </div>
    </div>
</div>
<br>
@endsection