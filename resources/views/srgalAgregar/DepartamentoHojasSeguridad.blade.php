@extends('admin.template.plantillabootstrap')
@section('title')
Modulo Seguridad
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
<!-- 
  
-->
  <div class="container">
    <br>   
    <div class="container text-center"><!-- INICIO FORM VINCULAR PRODUCTOS HOJAS -->
    <p class="h4 mb-4">AÑADIR HOJAS DE SEGURIDAD A LAS AREAS DEL CENTRO DE FORMACION</p>
      <form action="ModuloSeguridad" method="POST" class="text-center border border-light p-5">
        {{ csrf_field()}}
        <div class="row">
          <div class="col-6">
            <label>AREAS DEL CENTRO DE FORMACION</label>
            <hr>
            <select id="idAreasCentroFormacion" name="idAreasCentroFormacion" class="text-center form-control border-dark" required="true">
              <option value="{{null}}" selected>SELECCIONE EL AREA DEL CENTRO DE FORMACION</option>
              @foreach($listaAreaCentroFormacion as $a)
              <option value="{{$a->idAreasCentroFormacion}}">{{$a->nombreArea}}</option>
              @endforeach 
            </select>
            <br>
            <div>     <!--INI Carga Hojas de Seguridad del area Seleccionada -->
              <select multiple class="custom-select" size="5">
                <option class="text-center" value="{{null}}">ARCHIVOS DEL AREA</option>
                @foreach($listaProductos as $p)
                <option value="{{$p->idProducto}}">{{$p->nombreProducto}} / Marca: {{$p->marca}}</option>
                @endforeach
              </select>
            </div>    <!--FIN Carga Hojas de Seguridad del area Seleccionada -->
          </div>
          <div class="col-6">
            <label>HOJAS DE SEGURIDAD</label>
            <hr>
            <select name="idProducto" multiple class="custom-select" size="8">
              <option class="text-center" value="{{null}}">SELECCIONE UN ARCHIVO</option>
              @foreach($listaProductos as $p)
              <option value="{{$p->idProducto}}">{{$p->nombreProducto}} / Marca: {{$p->marca}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="container col-6">
          <button name="btn" value="guardarHojasAreas" class="btn btn-secondary bg-dark my-4 " type="submit">AÑADIR</button>
          <button name="btn" value="retirarHojasAreas" class="btn btn-secondary bg-dark my-4 " type="submit">RETIRAR</button>
          <button name="btn" value="borrarrHojasAreas" class="btn btn-secondary bg-dark my-4 " type="submit">BORRAR</button>
          <hr>
          <em>Area & Hoja de seguridad</em>
        </div> 
        
      </form>
    </div><!-- FIN FORM VINCULAR PRODUCTOS HOJAS -->
    <br>
    <div class="container">
      <p class="text-center h4 mb-4">AÑADIR DEPARTAMENTOS O HOJAS DE SEGURIDAD AL CENTRO DE FORMACION</p>
        <div class="row">
          <div class="col-6"><!-- INICIO FORM DE AREAS -->
            <form action="ModuloSeguridad" method="POST" class="text-center border border-light p-5">
            {{ csrf_field()}}
              <p class="h4 mb-4"> REGISTRO DE AREAS AL CENTRO DE FORMACION</p>
              <div class="form-row mb-4">
                  <div class="col">
                      <input type="text" name="nombreArea" class="form-control" placeholder="Nombre del area">
                  </div>
              </div>
              <input type="text" name="ubicacion" class="form-control mb-4" placeholder="Ubicacion">
              <button name="btn" value="guardarAreasCentroFormacion"class="btn btn-secondary bg-dark my-4 btn-block" type="submit">GUARDAR</button>
              <hr>
              <p>Verificar campos
                  <em>Registrados</em>
            </form>
          </div><!-- FIN FORM DE AREAS -->

          <!-- INICIO FORM DE HOJAS -->
          <div class="col-6">
              <form enctype="multipart/form-data" action="ModuloSeguridad" method="POST" class="text-center border border-light p-5">
                {{ csrf_field()}}
                <p class="h4 mb-4">REGISTRO DE HOJAS DE SEGURIDAD</p>
                <div class="form-row mb-4">
                    <div class="col">
                        <input type="text" name="nombreProducto" class="form-control" placeholder="Nombre del producto">
                    </div>
                    <div class="col">
                        <input type="text" name="marca" class="form-control" placeholder="Marca">
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="col">
                    <label>Nº : (ejemplo) S-VJXXX</label>
                        <input type="text" id="codigo" name="codigo" class="form-control" placeholder="Codigo">
                    </div>
                    <div class="col">
                    <label>Requiere hoja de seguridad:</label>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="requiereHojaSeguridad" id="requiereHojaSeguridad1" value="1">
                        <label class="form-check-label" for="requiereHojaSeguridad1">SI</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="requiereHojaSeguridad" id="requiereHojaSeguridad2" value="0">
                        <label class="form-check-label" for="requiereHojaSeguridad2">NO</label>
                      </div>
                    </div>
                </div>
                <label>Subir archivo pdf</label>
                <input type="file" name="archivoHojaSeguridad" class="form-control mb-4">
                <button name ="btn" value="guardarHojasSeguridad" class="btn btn-secondary bg-dark my-4 btn-block" type="submit">GUARDAR</button>
                <hr>
                <p id="sms"></p>
            </form>
          </div><!-- FIN FORM DE HOJAS -->
        </div>
    </div>
  </div>
@stop
<!-- @push('scripts')
<script src="{{ asset('plugins/personales/DepartamentoHojasSeguridad.js')}}" crossorigin="anonymous"></script>
@endpush -->