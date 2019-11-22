@extends('admin.template.plantillaGenerica')
@section('title')
Informe Reportes
@stop
@section('pgai')
{{ action('ReporteController@index') }}
@stop

@section('contenido')
<div>
    <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">SISTEMA DE REGISTRO DE LA GESTION AMBIENTAL INA LIBERIA</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Buscar" aria-label="Search">
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                    <span data-feather="home"></span>
                    Analisis PGAI <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file"></span>
                    Reportes
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="shopping-cart"></span>
                    Actividades
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="users"></span>
                    Objetivos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2"></span>
                    Avances
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="layers"></span>
                    Evidencias
                    </a>
                </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Otros Departamentos</span>
                <a class="d-flex align-items-center text-muted" href="#">
                    <span data-feather="plus-circle"></span>
                </a>
                </h6>
                <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Areas del Centro de Formacion
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Hojas de Seguridad
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Documentos Generales
                    </a>
                </li>
                </ul>
            </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Resultados</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Compartir</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Exportar</button>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    Esta Semana
                </button>
                </div>
                
            </div>

            <div class="my-4 w-100" id="myChart" width="900" height="380">
                <img src="asset('plugins/img/pdf.jpg')" alt="">
            </div>

            <h2>TABLA MAESTRA DE RESULTADOS</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Aspecto Ambiental</th>
                    <th>Prioridad</th>
                    <th>Fech inicial</th>
                    <th>Fech Final</th>
                    <th>Completo</th>

                    </tr>
                </thead>
                <tbody>
                @foreach($listarReportes as $listRep)
                    <tr>
                        <td>{{$listRep->idReporte}}</td>
                        <td>{{$listRep->aspectoAmbiental}}</td>
                        <td>{{$listRep->prioridad}}</td>
                        <td>{{$listRep->fechaInicial}}</td>
                        <td>{{$listRep->fechaFinal}}</td>
                        <td><a name="idReporte" href="{{ route('ver-reporte', Crypt::encrypt($listRep->idReporte) ) }}">Ver Reporte</a></td>

                <tbody>
                    </tr>
                @endforeach
                </tbody>
                </table>
            </div>
            </main>
        </div>
    </div>

</div>
<br>
<br>
<br>
<br>
@stop