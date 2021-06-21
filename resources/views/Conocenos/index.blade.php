@extends('layouts.admin')
@section('content')

<head>
  <title>Conocenos</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body data-spy="scroll" data-target="#myScrollspy" data-offset="1">
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card bg-black color">
                <div class="card-header"><h1><center>{{ __('FILOSOFÍA') }}</center></h1></div>
<div class="card-body ">

<div class="container-fluid bg-black color" >
  <div class="row">
    <nav class="col-sm-3 col-4" id="myScrollspy">
      <ul class="nav nav-pills flex-column">
        <li class="nav-item new">
          <a class="nav-link new2 active" href="#section1">DATAPLAY</a>
        </li>
        <li class="nav-item new">
          <a class="nav-link new2" href="#section3">MISIÓN</a>
        </li>
        <li class="nav-item new">
          <a class="nav-link new2" href="#section4">VISIÓN</a>
        </li>
        <li class="nav-item new">
          <a class="nav-link new2" href="#section5">VALORES</a>
        </li>
        <li class="nav-item dropdown">
          
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#section41">Link 1</a>
            <a class="dropdown-item" href="#section43">Link 3</a>
            <a class="dropdown-item" href="#section44">Link 4</a>
            <a class="dropdown-item" href="#section45">Link 5</a>
          </div>
        </li>
      </ul>
    </nav>
    <div class="col-sm-9 col-7">
      <div id="section1" class="bg-black color" >    
        <h1>DATAPLAY</h1>
        <p>Nuestro principal interés es mantenerte informado sobre 
        los diferentes videojuegos y las noticias más interesantes 
        de las compañías de videojuegos más grandes del mundo. 
        En este sitio podras:


 


 
        </p>
        <li>Contenido útil y fácil de entender.</li>
        <li>Visualización en diferentes dispositivos (adaptable).</li>
        <li>Mantente informado sobre tus títulos favoritos.</li>
        <li>Encuentra los juegos de tu agrado.</li>
        <li>Las noticias de mayor relevancia entorno a los videojuegos.</li><br>
      </div><br>
      <div id="section2" class="bg-black color"> 
        <h1>Nuestro logo</h1><br>
        <center><img src="../assets/img/DATAPLAY.png" alt="" style="padding:5px; margin:5px; width:300px; height:300px;"></center><br>
      </div><br> 
      <div id="section3" class="bg-black color"> 
        <h1>Misión</h1>
        <p>Somos un grupo de estudiantes universitarios del área de tecnologías de la información enfocados en el diseño y desarrollo web, tratando de innovar en el área del e-commerce, buscamos liderar la venta de videojuegos en línea con un sitio visualmente atractivo haciendo uso de temáticas “gaming” y que sea lo más intuitivo para el usuario.<br></p>
      </div>    <br>    
      <div id="section4" class="bg-black color">         
        <h1>Visión</h1>
        <p>Buscamos estar bien posicionados en el e-commerce, al ser jóvenes siempre buscamos la competencia y mejorar la calidad en nuestro sitio, además de querer aprender de las nuevas tecnologías buscamos siempre estar actualizados e innovando y que nuestro trabajo genere eco en las empresas de desarrollo de videojuegos para así poder tener su confianza y nos permitan distribuir sus productos, creemos que nuestra ambición por ser los mejores es nuestra principal inspiración para llegar a serlo, buscando siempre la mejor atención para nuestros clientes.<br></p>
      </div><br>
      <div id="section5" class="bg-black color">         
        <h1>Valores</h1>
        <li>Colaboración.</li>
        <li>Aprendizaje.</li>
        <li>Excelencia.</li>
        <li>Pasión.</li>
        <li>Desarrollo.</li>
        <li>Innovación.</li>
        <li>Calidad.</li>
        <li>Usabilidad.</li>
        <li>Creatividad.</li><br>
      </div>
     
  </div>
</div>

</body>


@endsection



























  <style>
  body {
    position: relative;
  }
  ul.nav-pills {
    top: 200px;
    position: sticky;
  }
  div.col-8 div {
    height: 500px;
  }

      .new2{
        color:skyblue;  
        font-size: 18px ;  
          text-shadow: 2px 2px 1px black;
      }  

      .new:hover{
        color:skyblue;
        background-color: white;
        border: 3px;
        border-style: ridge;
      }

  .color{
  	color: white;
    text-align: justify;
    padding: inherit;
      border: 3px;
      border-style: ridge;
  }
      
  h1{
    background-color: black;
    color: deepskyblue;
    text-shadow: 2px 2px 1px white;
    
    }

  </style>

