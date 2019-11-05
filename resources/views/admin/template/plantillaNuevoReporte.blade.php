@extends('admin.template.plantillaGenerica')
@section('title')
Nuevo Reporte
@stop
@section('pgai')
{{ action('ReporteController@index') }}
@stop
@section('contenido')
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header text-center" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link text-dark font-weight-bolder" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Encabezado de Reporte
                </button>
            </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    @yield('EncabezadoReporte')
                </div>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed text-dark font-weight-bolder" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Actividad Ambiental
                </button>
            </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    @yield('ActividadAmbiental')
                </div>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-header" id="headingThree">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed text-dark font-weight-bolder" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Tipo de Actividad
                </button>
            </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    @yield('TipoActividad')
                </div>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-header" id="headingFour">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed text-dark font-weight-bolder" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                Objetivos
                </button>
            </h2>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                    @yield('Objetivos')
                </div>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-header" id="headingFive">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed text-dark font-weight-bolder" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                Avances
                </button>
            </h2>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                <div class="card-body">
                    @yield('Avances')
                </div>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-header" id="headingSix">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed text-dark font-weight-bolder" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                Evidencias
                </button>
            </h2>
            </div>
            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                <div class="card-body">
                    @yield('Evidencias')
                </div>
            </div>
        </div>
    </div>
@stop
