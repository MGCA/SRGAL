@extends('admin.template.plantillaNuevoReporte')

    @section('EncabezadoReporte')
        <form method="POST" data-toggle="validator" action="EditarReporte">
            {{ csrf_field()}}
            <h6 class="modal-title text-center">REPORTE</h6>
            <hr class="border-warning">
                <div class="row">
                    <div class="col-6 form-group">
                        <label class="font-weight-bolder">ASPECTO AMBIENTAL</label>
                        <textarea type="text" class="form-control border-dark" name="aspectoAmbiental" placeholder="Escribir" required></textarea>
                    </div>
                    <div class="col-6 form-group">
                        <label class="font-weight-bolder">PRIODIDAD</label>
                        <select name="prioridad" class="text-center form-control border-dark" required="true">     
                            <option selected>--SELECCIONE--</option>
                            <option >Baja</option>
                            <option >Media</option>
                            <option >Alta</option>
                        </select>
                        <label class="font-weight-bolder">PRESUPUESTO</label>
                        <input type="text" name="presupuesto" class="form-control text-center" aria-describedby="Cuanto presupuesto ocupa??" placeholder="------MONTO------" required="true">
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-4 form-group">
                        <label class="font-weight-bolder">FECHA INICIAL</label>
                        <input type="date" name="fechaInicial" class="form-control border-dark" placeholder="Escribir" required>
                    </div>
                    <div class="col-4 form-group">
                        <label class="font-weight-bolder">FECHA FINAL</label>
                        <input type="date" name="fechaFinal" class="form-control border-dark" placeholder="Escribir" required>
                    </div>
                    <div class="col-4 form-group">
                        <label class="font-weight-bolder">ESTADO</label>
                        <div class="form-control">
                            <input class="form-check-input" name="estado" type="radio" id="exampleRadios1" value="1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Completado
                            </label>
                        </div>
                        <div class="form-control">
                            <input class="form-check-input" name="estado" type="radio" id="exampleRadios1" value="0" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Incompleto
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                        <label class="font-weight-bolder">META AMBIENTAL</label>
                        <textarea type="text" name="metaAmbiental" class="form-control border-dark" placeholder="Escribir" required></textarea>
                </div>
                <button name="btn" value="guardarReporte" class="btn btn-secondary bg-dark" type="submit">Guardar</button>
            <hr class="border-warning">

        </form>
    @stop
    @section('ActividadAmbiental')
        <form method="POST" data-toggle="validator" action="EditarReporte">
            {{ csrf_field()}}
            <h6 class="modal-title text-center">ACTIVIDAD AMBIENTAL</h6>
            <hr class="border-warning">
                <select name="idReporte" class="text-center form-control border-dark" required="true">     
                    <option value="{{null}}" selected>SELECCIONE AL REPORTE QUE PERTENECE</option>
                        @foreach($reporte as $r)
                            <option value="{{ $r->idReporte}}">{{$r->aspectoAmbiental}}</option>
                        @endforeach
                </select>
                <br>
                <div class="row">
                    <div class="col-12 form-group">
                        <label class="font-weight-bolder">DESCRIPCION DE LA ACTIVIDAD AMBIENTAL</label>
                        <textarea type="text" name="descripcionActividadAmbiental" class="form-control border-dark" placeholder="Escribir" required></textarea>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6 form-group">
                        <label class="font-weight-bolder">RECURSO</label>
                        <input type="text" name="recurso" class="form-control border-dark" placeholder="Escribir" required>
                    </div>
                    <div class="col-6 form-group">
                        <label class="font-weight-bolder">INDICADOR</label>
                        <input type="text" name="indicador" class="form-control border-dark" placeholder="Escribir" required>
                    </div>
                </div>
                <button name="btn" value="guardarActividadAmbiental" class="btn btn-secondary bg-dark" type="submit">Guardar</button>
            <hr class="border-warning">
        </form>
    @stop
    @section('TipoActividad')
        <form method="POST" data-toggle="validator" action="EditarReporte">
            {{ csrf_field()}}
            <h6 class="modal-title text-center">TIPO DE ACTIVIDAD</h6>
            <hr class="border-warning">
                <select name="idActividadAmbiental" class="text-center form-control border-dark" required="true">     
                    <option value="{{null}}" selected>Seleccione la actividad ambiental que desea añadir al tipo de actividad</option>
                        @foreach($actividadAmbiental as $actiAmbi)
                            <option value="{{ $actiAmbi->idActividadAmbiental}}">{{$actiAmbi->descripcionActividadAmbiental}}</option>
                        @endforeach
                </select>
                <br>
                <div class="form-group">
                    <label class="font-weight-bolder">NOMBRE DE ACTIVIDAD</label>
                        <input type="text" class="form-control border-dark" name="nombreActividad" required>
                </div>
                <button name="btn" value="guardarTipoActividad" class="btn btn-secondary bg-dark" type="submit">Guardar</button>
            <hr class="border-warning">
        </form>
    @stop
    @section('Objetivos')
        <form method="POST" data-toggle="validator" action="EditarReporte">
            {{ csrf_field()}}
                <h6 class="modal-title text-center">OBJETIVOS</h6>
                <hr class="border-warning">
                    <select name="idActividadAmbiental" class="text-center form-control border-dark" required="true">     
                        <option value="{{null}}" selected>Seleccione la actividad ambiental que desea añadir al objetivo</option>
                        @foreach($actividadAmbiental as $actiAmbi)
                        <option value="{{ $actiAmbi->idActividadAmbiental}}">{{$actiAmbi->descripcionActividadAmbiental}}</option>
                        @endforeach
                    </select>
                    <br>
                    <div class="form-group">
                        <label class="font-weight-bolder">DESCRIPCION OBJETIVO</label>
                        <textarea type="text" name="descripcionObjetivo" class="form-control border-dark" placeholder="Escribir" required></textarea>
                    </div>
                    <button name="btn" value="guardarObjetivos" class="btn btn-secondary bg-dark" type="submit">Guardar</button>
                <hr class="border-warning">
        </form>
    @stop
    @section('Avances')
        <form method="POST" data-toggle="validator" action="EditarReporte">
            {{ csrf_field()}}
                <h6 class="modal-title text-center">AVANCES</h6>
                <hr class="border-warning">
                    <select name="idTipoActividad" class="text-center form-control border-dark" required="true">     
                        <option value="{{null}}" selected>SELECCIONE AL TIPO DE ACTIVIDAD QUE PERTENECE</option>
                            @foreach($tipoActividad as $t)
                                <option value="{{$t->idTipoActividad}}">{{$t->nombreActividad}}</option>
                            @endforeach
                    </select>
                    <br>
                    <div class="form-group">
                        <label class="font-weight-bolder">DESCRIPCION AVANCE</label>
                        <textarea type="text" name="descripcionAvance" class="form-control border-dark" placeholder="Escribir" required></textarea>
                    </div>
                    <button name="btn" value="guardarAvance" class="btn btn-secondary bg-dark" type="submit">Guardar</button>
                <hr class="border-warning">
        </form>
    @stop
    @section('Evidencias')
        <form enctype="multipart/form-data" action="EditarReporte" method="POST" data-toggle="validator">
            {{ csrf_field()}}
                <h6 class="modal-title text-center">EVIDENCIAS</h6>
                <hr class="border-warning">
                    <select name="idAvance" class="text-center form-control border-dark" required="true">     
                        <option value="{{null}}" selected>Seleccione el avance para añadir una evidencia</option>
                        @foreach($avance as $a)
                        <option value="{{$a->idAvance}}">{{$a->descripcionAvance}}</option>
                        @endforeach
                    </select>
                    <br>
                        <div class="form-group">
                        <label class="font-weight-bolder">NOMBRE DE EVIDENCIA</label>
                        <textarea type="text" name="nombreEvidencia" class="form-control border-dark" placeholder="Escribir" required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bolder form-control">ADJUNTAR ARCHIVO</label>
                            <input id="idArchivo" type="file" name="archivo" class=" border-dark"/>
                        </div>
                    <button name="btn" value="guardarEvidencia" class="btn btn-secondary bg-dark" type="submit">Guardar</button>
                <hr class="border-warning">
        </form>
    @stop

    

