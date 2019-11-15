@extends('admin.template.plantillabootstrap')

@section('title')
Documentos Generales
@stop

@section('cabecera')
  <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand text-warning font-weight-bold" href="{{('/GestionPgai')}}">PGAI</a>
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
            <a class="dropdown-item" href="{{ action('DocumentosGeneralesController@index') }}">Documentos Generales</a>
            <a class="dropdown-item" href="{{ action('DepartamentoHojasSeguridadController@index') }}">Hojas de Seguridad</a>
            <a class="dropdown-item" href="{{ action('GestoresAutorizadosController@index') }}">Gestores Autorizados</a>
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

@section('imagenes')
<div class="container border border-light p-3 text-center">
   <form enctype="multipart/form-data" action="DocumentosGenerales" method="POST"><!--Inicio de Formulario Documentos generales -->
   {{ csrf_field()}}
   <p class="h4 mb-4">DOCUMENTOS GENERALES</p>
   <br>
    <div class="row">
      <div class="col-6">
        <label class="text-center">Nombre del documento</label>
        <input class=" text-center form-control" type="text" name="nombreDocumento" placeholder="ESCRIBA AQUI EL NOMBRE" required>
      </div>
      <div class="col-6">
        <label class="text-center">Tipo de Evidencia</label>
        <div class="form-control">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tipoEvidencia" id="inlineRadio1">
            <label class="form-check-label" for="inlineRadio1">Proyecto</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tipoEvidencia" id="inlineRadio2">
            <label class="form-check-label" for="inlineRadio2">Formulario</label>
          </div>
        </div>
        
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-4">
        <label class="text-center">Fecha de Creacion</label>
        <input class="text-center form-control" type="date" name="fechaCreacion" required>
      </div>
      <div class="col-8">
        <label class="text-center">Responsable</label>
        <input class=" text-center form-control" type="text" name="idResponsable" placeholder="RESPONSABLE" required>
      </div>
    </div>
    <br>
    <div class="border border-light p-3">
      <p class="h5 mb-4">AÑADIR ARCHIVO O DOCUMENTO</p>
      <div class="row form-control">
        <input type="file" name="archivoDocumentoGeneral" required>
      </div>
    </div>
    <br>
    <button type="submit" name="btn" value="guardarDocumentosGenerales" class="btn btn-secondary bg-dark">GUARDAR</button>
    <br>
  </form>
  <br>
</div>
<br>
<br>
@stop