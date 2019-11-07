@extends('admin.template.plantillabootstrap')
@section('title')
Gestores Autorizados
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
  <div class="container">
    <form enctype="multipart/form-data" action="GestoresAutorizados" method="POST" class="text-center border border-light p-5 ">
        {{ csrf_field()}}
          <p class="h4 mb-4">GESTORES AUTORIZADOS</p>
          <div class="row">
              <div class="form-group col-md-6">
                  <label>Nombre de gestor/ Empresa Gestora:</label>
                  <input name="nombreGestor" type="text" class="form-control text-center" placeholder="ESCRIBA EL NOMBRE AQUI">
              </div>
              <div class="form-group col-md-6">
                  <label>Telefono:</label>
                  <input name="telefonoGestor" type="text" class="form-control text-center" placeholder="506-0000-0000">
              </div>
          </div>
          <div class="form-group">
              <label >Direccion:</label>
              <input name="direccionGestor" type="text" class="form-control text-center" placeholder="50 ESTE DE LA VUELTA DEL PGAI">
          </div>
          <div class="row">
              <div class="form-group col-md-4">
                  <label >Cedula:</label>
                  <input name="cedulaContacto" type="text" class="form-control text-center" placeholder="ID= 0-0000-0000">
              </div>
              <div class="form-group col-md-4">
                  <label>Nombre del contacto:</label>
                  <input name="nombreContacto" type="text" class="form-control text-center" placeholder="PRIMER NOMBRE">
              </div>
              <div class="form-group col-md-4">
                  <label>Correo:</label>
                  <input name="correoContacto" type="email" class="form-control text-center" placeholder="ESCRIBIR_MI@CORREO.COM">
              </div>
          </div>
          <br>
          <div class="row">
            <div class="container col-3">
              <label>Telefono:</label>
              <input name="telefonoContacto" type="text" class="form-control text-center" placeholder="506-0000-0000">
            </div>
          </div>
          <div class="row">
              <div class="form-group col">
                  <label>Tipo de Residuos:</label>
                  <select name="tipoResiduo" class="text-center form-control border-dark">
                      <option value="{{null}}" selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                  </select>
              </div>
              <div class="align-items-center form-group col">
                  <label>Fecha de Vencimiento de Permiso</label>
                  <input name="fechaVencimientoPermiso" type="date" class="text-center form-control">
              </div>
          </div>
          <div class="border border-light p-3">
              <label>Adjuntar permiso PDF o IMG:</label>
              <div class="row form-control">
                  <input type="file" name="documentoPermiso">
              </div>
          </div>
          <br>
          <button name="btn" value="guardarGestoresAutorizados" type="submit" class="btn btn-secondary bg-dark">GUARDAR</button>
      </form>
    <br>
  </div>
  <br>
@stop