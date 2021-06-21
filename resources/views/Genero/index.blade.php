@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Género') }}</div>
<div class="card-body">
    
<a href="{{route('Genero.create')}}">Registrar Género</a> <br> <br>
@if(Session::has('message'))
      {{ Session::get('message') }} <br><br>
@endif
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Genero</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tableGenero as $rowGenero)
            <tr>
                <td>
                    <a href="{{route('Genero.show', $rowGenero->id)}}">{{$rowGenero->nombre}}</a>
                </td>
                <td>
                        <img src="{{ asset('storage/'.$rowGenero->imgNombreFisico )}}" width="20%">
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
