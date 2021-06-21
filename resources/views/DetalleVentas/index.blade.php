@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Ventas') }}</div>
<div class="card-body">

@if(Session::has('message'))
      {{ Session::get('message') }} <br><br>
@endif
<table class="table table-striped">
    <thead>
        <tr>
  
            <th>precio</th>
            <th>cantidad</th>
            <th>Juego</th>
            <th>Venta Total</th>
            <th>ID de venta</th>
       
        </tr>
    </thead>
    <tbody>
        @foreach($tableDetalleVentas as $rowDetalleVenta)
            <tr>

                <td>
                    {{$rowDetalleVenta->precio}}
                </td>

                <td>
                    {{$rowDetalleVenta->cantidad}}
                </td>

                <td>
                    {{$rowDetalleVenta->getJuegos->nombre}}
                </td>

                <td>
                    {{$rowDetalleVenta->getVenta->total}}
                </td>

                <td>
                    {{$rowDetalleVenta->venta_id}}
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
