@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-info mb-3" style="max-width: 65rem; , max-heigth: 60rem;">
                <legend class="card header text-white bg-info mb-2 text-center">{{ __('Roles') }}</legend>
                    <div class="card-body text-info">
                        <a href="{{route('Roles.create')}}"> Registrar Rol</a><br><br>
@if(Session::has('message'))
      {{ Session::get('message') }} <br><br>
@endif
<table class="table table-striped">
    <thead>
        <tr>
            <th>Rol</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tableRoles as $rowRol)
            <tr>
                <td>
                    <a href="{{route('Roles.show', $rowRol->id)}}">{{$rowRol->nombre}}</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
        </div>
    </div>
</div>
<br>

@endsection
