@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Proveedor') }}</div>
<div class="card-body">
    
<a href="{{route('Proveedor.create')}}">Registrar Proveedor</a> <br> <br>
@if(Session::has('message'))
      {{ Session::get('message') }} <br><br>
@endif
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Proveedor</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tableProveedor as $rowProveedor)
            <tr>
                <td>
                    <a href="{{route('Proveedor.show', $rowProveedor->id)}}">{{$rowProveedor->nombre}}</a>
                </td>
                <td>
                        <img src="{{ asset('storage/'.$rowProveedor->imgNombreFisico )}}" width="20%">
                    </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
                </div>
        </div>
    </div>
</div>
@endsection
