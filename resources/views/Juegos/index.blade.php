@extends('layouts.admin')
@section('content')
@if( \Auth::user()->rol_id== 2 )

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Juegos') }}</div>
<div class="card-body">

<a href="{{route('Juegos.create')}}">Registrar Juego</a> <br> <br>
@if(Session::has('message'))
      {{ Session::get('message') }} <br><br>
@endif

<form>
<div class="row">
<div class="form-group col-md-3">
<label for="nombre">Filtrar por nombre</label>
<input type="text" name="nombre" value="{{$filtroNombre}}" class="form-control">
</div>
</div>
<button>Buscar</button>
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>status</th>
            <th>stock</th>
            <th>Portada</th>
             <th>Proveedor</th>
            <th>Género</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tableJuegos as $rowJuegos)
            <tr>
                <td>
                    <a href="{{route('Juegos.show', $rowJuegos->id)}}">{{$rowJuegos->nombre}}</a>
                </td>
                <td>{{$rowJuegos->descripcion}}</td>
                <td>{{$rowJuegos->precio}}</td>
                <td>{{$rowJuegos->status}}</td>
                <td>{{$rowJuegos->stock}}</td>
                
                <td>
                        <img src="{{ asset('storage/'.$rowJuegos->imgNombreFisico )}}" width="30%">
                    </td>
                <td>{{$rowJuegos->getProveedor->nombre}}</td>
                <td>{{$rowJuegos->getGenero->nombre}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>
                </div>
        </div>
    </div>
</div>


@else

@if(Session::has('message'))
      {{ Session::get('message') }} <br><br>
@endif

<div class="container">
    <div class="row justify-content-center">
        
            <div class="card">
                <center><div class="card-header"><h1>{{ __('Catálogo de Juegos') }}</h1></div></center>
<div class="card-body">
<div class ="row">


 @foreach($tableJuegos as $rowJuegos)
<div class="col-md-6">
<center><figure class="figure">
  <a href="{{route('Juegos.show', $rowJuegos->id)}}" data-size="1200x1017"><h1>{{$rowJuegos->nombre}}</h1>
  <img src="{{ asset('storage/'.$rowJuegos->imgNombreFisico )}}" class="figure-img img-fluid rounded" width="90%" height="100px" alt="...">  
</figure>
</a>

<h6>{{$rowJuegos->genero}}</h6>
<td>
{{ Form::open(['url' => 'agregarCarrito'] ) }}
{{ Form::hidden('id', $rowJuegos->id ,
array('class' => 'form-control')) }}

{{ Form::hidden('nombre', $rowJuegos->nombre ,
array('class' => 'form-control'))}} <br>  

{{ Form::hidden('precio', $rowJuegos->precio ,
array('class' => 'form-control')) }} <br>

{{ Form::text('cantidad', 1 ,
array('class' => 'form-control', 'required'=>true)) }} <br>
{{ Form::submit('Agregar al carrito',['class' => 'btn btn-primary btn-lg btn-block', 'data-toggle'=>"modal",'data-target'=>"#exampleModal" , 'role' => 'button' , 'aria-pressed' => 'true'] ) }}
{{ Form::close()}}
</td>
</center>
<br>                
<a href="{{route('Juegos.show', $rowJuegos->id)}}" class="btn btn-secondary btn-lg btn-block" role="button" aria-pressed="true">Detalle de juego </a>
                </div>
        
        
@endforeach


    </div>
            </div>
        </div>
    </div>
</div>




<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Catalogo de juegos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Juego agregado con exito!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



@foreach($tableJuegos as $rowJuegos)
<body>
<div class="container">
    <h3 class="h3">Catalogo de productos </h3>
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#">
                        <img class="pic-1" src="{{ asset('storage/'.$rowJuegos->imgNombreFisico )}}">
                        <img class="pic-2" src="{{ asset('storage/'.$rowJuegos->imgNombreFisico )}}">
                    </a>
                    <ul class="social">
                        <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                        <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    <span class="product-new-label">Sale</span>
                    <span class="product-discount-label">20%</span>
                </div>
                <ul class="rating">
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star disable"></li>
                </ul>
                <div class="product-content">
                    <h3 class="title"><a href="{{route('Juegos.show', $rowJuegos->id)}}">{{$rowJuegos->nombre}}</a></h3>
                    <div class="price">${{$rowJuegos->precio}}
                        <span>$350.00</span>
                    </div>
                    <a class="add-to-cart" href="">+ Add To Cart</a>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
@endforeach
</body>


@endif
@endsection
