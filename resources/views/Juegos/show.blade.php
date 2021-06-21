@extends('layouts.admin')
@section('content')
@if( \Auth::user()->rol_id== 2 )

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Juegos') }}</div>
<div class="card-body">

<a href="{{route('Juegos.index')}}">Inicio</a> <br><br>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Información del juego</th>
            <th>
                {{ Form::open(array('url' => route('Juegos.destroy', $modelo->id), 'class' => 'pull-right')) }}
                    <a class="btn btn-primary" href="{{route('Juegos.edit', $modelo->id)}}">Editar</a>
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Borrar', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </th>
        </tr>
    </thead>
    <tbody>
            <tr><td> Nombre del Juego </td> <td>{{$modelo->nombre}}</td></tr>
            <tr><td> Descripción </td> <td>{{$modelo->descripcion}}</td></tr>
            <tr><td> Precio </td> <td>{{$modelo->precio}}</td></tr>
            <tr><td> Estatus </td> <td> @if($modelo->status) Sí @else No @endif </td></tr>
            <tr><td> Stock </td> <td>{{$modelo->stock}}</td></tr>
            <tr><td> Género </td> <td>{{$modelo->getGenero->nombre}}</td></tr>
            <tr><td> Proveedor </td> <td>{{$modelo->getProveedor->nombre}}</td></tr>
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
        <div class="col-md-5">
            <div class="card">
                <h1><div class="card-header">{{$modelo->nombre}}</div></h1>
<div class="card-body">

          <center><td><img src="{{ asset('storage/'.$modelo->imgNombreFisico )}}" width="90%"></td></center><br>
            <h5>Descripción:</td> <td>{{$modelo->descripcion}}<br></h5>
             <h5>Precio: </td> <td>{{$modelo->precio}}<br></h5>
             <h5>Stock: </td> <td>{{$modelo->stock}}<br></h5>
             <h5>Género: </td> <td>{{$modelo->getGenero->nombre}}<br></h5>
             


       
</div>
                </div>
        </div>
    </div>
</div>




@endif

@endsection
