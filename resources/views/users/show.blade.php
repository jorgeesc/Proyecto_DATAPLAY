@extends('layouts.admin')
@section('content')
@if( \Auth::user()->rol_id== 2 )
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Usuarios') }}</div>
<div class="card-body">

<a href="{{route('users.index')}}">Inicio</a> <br><br>
 
<table class="table table-striped">
    <thead>
        <tr>
            <th>Información del usuario</th>
            <th>
                {{ Form::open(array('url' => route('users.destroy', $modelo->id), 'class' => 'pull-right')) }}
                    <a class="btn btn-primary" href="{{route('users.edit', $modelo->id)}}">Editar</a>
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Borrar', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </th>
        </tr>
    </thead>
    <tbody>
            <tr><td> Nombre de Usuario </td> <td>{{$modelo->name}}</td></tr>
            <tr><td> Correo </td> <td>{{$modelo->email}}</td></tr>
            <tr><td> Rol </td> <td>{{$modelo->getRol->nombre}}</td></tr>
            <tr><td> Fecha de registro </td> <td>{{$modelo->created_at}}</td></tr>
            <tr><td> Fecha de modificación </td> <td>{{$modelo->updated_at}}</td></tr>
    </tbody>

</table>

</div>
                </div>
        </div>
    </div>
</div>

@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Mi Perfil') }}</div>
<div class="card-body">

<a href="{{route('home')}}">Inicio</a> <br><br>
 
<table class="table table-striped">
    <thead>
        <tr>
            <th>Datos personales</th>
            <th>
                
                    <a class="btn btn-primary" href="{{route('users.edit', $modelo->id)}}">Editar</a>
                    
                {{ Form::close() }}
            </th>
        </tr>
    </thead>
    <tbody>
            <tr><td> Nombre de Usuario </td> <td>{{$modelo->name}}</td></tr>
            <tr><td> Correo </td> <td>{{$modelo->email}}</td></tr>
            <tr><td> Rol </td> <td>{{$modelo->getRol->nombre}}</td></tr>
            <tr><td> Fecha de registro </td> <td>{{$modelo->created_at}}</td></tr>
            <tr><td> Fecha de modificación </td> <td>{{$modelo->updated_at}}</td></tr>
    </tbody>

</table>

</div>
                </div>
        </div>
    </div>
</div>

@endif
@endsection