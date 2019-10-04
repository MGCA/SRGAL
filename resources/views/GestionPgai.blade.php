@extends('admin.template.plantillabootstrap')

@section('title')
Funcionario
@stop

@section('cabecera')
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand font-weight-bold" href="{{('/')}}">PGAI</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" 
      aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestion<span class="sr-only">(current)</span></a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{ action('FuncionarioController@index') }}">Funcionarios</a>
            <a class="dropdown-item" href="{{ action('PuestoController@ListarPuestos') }}">Puestos</a>
            <a class="dropdown-item" href="#">Reportes Generales</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ action('ReporteController@NuevoReporte') }}">Nuevo Reporte</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ver Reporte</a>
        </li>
      </ul>
    </div>
  </nav>
@stop

@section('imagenes')
<main role="main" class="container">
  <div class="bd-example">
    <div id="imagenes" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#imagenes" data-slide-to="0" class="active"></li>
        <li data-target="#imagenes" data-slide-to="1"></li>
        <li data-target="#imagenes" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active" style="height:90vh">
          <img src="{{ asset('plugins/img/carusel/slider4.jpg')}}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Responsabilidad</h5>
            <p>Comprometidos con el ambiente, por un desarrollo sostenible.</p>
          </div>
        </div>
        <div class="carousel-item" style="height:90vh">
          <img src="{{ asset('plugins/img/carusel/slider1.jpg')}}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Bandera Azul</h5>
            <p>Programa de Gestion Ambiental Institucional</p>
          </div>
        </div>
        <div class="carousel-item" style="height:90vh">
          <img src="{{ asset('plugins/img/carusel/slider2.jpg')}}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Auditorias</h5>
            <p>Nuestra evaluacion interna, es necesaria para poder mejorar cada vez mas.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#imagenes" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="carousel-control-next" href="#imagenes" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
      </a>
    </div>
  </div>
</main>
  
@stop







    



