<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css')}}">
    <title>Reporte Completo</title>

</head>
<body>
<br>
    <div class="border">
        <div class="text-center">
            <div class="jumbotron">
                <h3 CLASS="text-warning">REPORTE DEL PROGRAMA DE LA GESTION AMBIENTAL</h3>
                <h4 class="text-dark font-weight-bolder">CENTRO POLIVALENTE INA LIBERIA SEDE CHOROTEGA</h4>      
            </div>
        </div>
        <hr>
        <div class="container" >
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <h6 class="border-bottom border-gray pb-2 mb-0 font-weight-bolder">Informe de reportes</h6>
                
                
                <div>
                    <div class="row">
                        
                        <div class="col-6">
                        @foreach($obtenerRepActObj as $orao)
                            <br>
                            <div class="row">
                                <div class="form-control col-4">
                                    <label class="font-weight-bolder" for="idReporte"> ID REPORTE Nº: </label> {{ $orao->idReporte}}
                                </div>
                                <div class="form-control col-8">
                                    <label class="font-weight-bolder" for="actualizado"> Ultm.Actu: </label> {{ $orao->updated_at}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label class="font-weight-bolder" for="aspectoAmbiental">Aspecto Ambiental: </label> {{$orao->aspectoAmbiental}}
                                    <br>
                                    <label class="font-weight-bolder" for="prioridad">Prioridad: </label> {{$orao->prioridad}}
                                    <br>
                                    <label class="font-weight-bolder" for="aspectoAmbiental">Descripcion de la actividad Ambiental:</label>
                                    <p>
                                    {{$orao->descripcionActividadAmbiental}}
                                    </p>
                                    <label class="font-weight-bolder" for="indicador">Indicador:</label>
                                    <p>
                                    {{$orao->indicador}}
                                    </p>
                                    <label class="font-weight-bolder" for="recurso">Recurso:</label>
                                    <p>
                                    {{$orao->recurso}}
                                    </p>
                                    <label class="font-weight-bolder" for="descripcionObjetivo">Descripcion del Objetivo:</label>
                                    <p>
                                    {{$orao->descripcionObjetivo}}
                                    </p>
                                </div>
                            </div> 
                        @endforeach
                        </div>
                        <div class="col-6"> 
                        @foreach($obtenerTipActEveAvaGes as $otaeag)
                            <br>
                            <div class="col-12">
                                <label class="font-weight-bolder form-control text-center" for="idTipoActividad">TIPOS DE ACTIVIDADES DEL REPORTE: {{ $otaeag->idReporte}}</label> 
                                <label class="font-weight-bolder" for="nombreTipoActividad">Tipo de Actividad:</label>
                                <p>
                                {{$otaeag->nombreTipoActividad}}
                                </p>
                                <label class="font-weight-bolder" for="descripcionAvance">Descripcion del avance: </label>
                                <p>
                                {{$otaeag->descripcionAvance}}
                                </p>
                                <label class="font-weight-bolder" for="idEvidencia">ID EVIDENCIA:</label> {{$otaeag->idEvidencia}}
                                <br>
                                <label class="font-weight-bolder" for="nombreEvidencia">Nombre de la evidencia: </label>
                                <p>
                                {{$otaeag->nombreEvidencia}}
                                </p>

                            </div>
                        @endforeach
                        </div>
                    </div>
                    <a href="{{ route('ListarReporte') }}"><button class="button" type="btn">Atras</button></a> 
                </div>
                 
                
                <small class="d-block text-right mt-3">
                <a href="{{ route('pdf-reporte', Crypt::encrypt($id) ) }}">Descargar</a>
                 
                </small>
            </div>
        </div>   

    </div>
    <div>
        
    </div>
</body>
</html>