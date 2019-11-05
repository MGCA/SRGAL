@extends('admin.template.plantillabootstrap')
@section('title')
Modulo Seguridad
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
            <a class="dropdown-item" href="#">Hojas de Seguridad</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ action('ReporteController@NuevoReporte') }}">Nuevo Reporte</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ action('ReporteController@pdfExportarReporte') }}">Ver Reporte</a>
        </li>
      </ul>
      <!-- cerrar cession -->
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                {{ __('Cerrar sesion') }}
              </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
        <!-- fin de cerrar cession -->
    </div>
  </nav>
@stop