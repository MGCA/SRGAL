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
                    <select name="prioridad" class="form-control border-dark" required="true">     
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
        <form action="EditarReporte" method="POST" data-toggle="validator">
            {{ csrf_field()}}
                <h6 class="modal-title text-center">ACTIVIDAD AMBIENTAL</h6>
                <hr class="border-warning">
                <div class="row">
                    <div class="col-6 form-group">
                        <label class="font-weight-bolder">DESCRIPCION DE LA ACTIVIDAD AMBIENTAL</label>
                        <textarea type="text" class="form-control border-dark" placeholder="Escribir"></textarea>
                    </div>
                    <div class="container col-6 border-dark">
                        <h6 class="modal-title text-center">Tipo de Actividad</h6>
                        <hr class="border-dark">                
                            <!-- Agregar -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title font-weight-bold" id="exampleModalLabel">AGREGAR TIPO DE ACTIVIDAD</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container border border-dark bg-light">
                                                <form action="EditarReporte" method="POST" data-toggle="validator">
                                                    {{ csrf_field()}}
                                                    <div class="form-group text-center">
                                                        <label class="font-weight-bold">INGRESE UN NUEVO TIPO DE ACTIVIDAD</label>
                                                        <input type="text" name="nombreActividad" class="form-control text-center" aria-describedby="Ingrese un tipo de actividad" placeholder="------ESCRIBIR------" required="true">
                                                        <small id="puestoHelp" class="form-text text-muted">Escriba el nuevo tipo de actividad.</small>
                                                    </div>
                                                </form>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" name="btn" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                                            <button type="submit" value="nuevo" name="btn" class="btn btn-secondary">GUARDAR</button>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            
                        <div class="row">
                            <div class="col-6">
                                <select id="idTipoActividad" name="idTipoActividad" class="form-control border-dark" required="true">     
                                    <option selected>--SELECCIONE--</option>
                                    @foreach($tipoActividad as $t)
                                    <option value="{{$t->idTipoActividad}}">{{$t->nombreActividad}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <button type="button" name="btn" value="insertar" data-toggle="modal" data-target="#exampleModal" class="btn btn-secondary bg-dark btn-block form-control">
                                    Nuevo
                                </button>
                            </div>
                        </div>
                                       
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6 form-group">
                        <label class="font-weight-bolder">RECURSO</label>
                        <input type="text" class="form-control border-dark" placeholder="Escribir">
                    </div>
                    <div class="col-6 form-group">
                        <label class="font-weight-bolder">INDICADOR</label>
                        <input type="text" class="form-control border-dark" placeholder="Escribir">
                    </div>
                </div>
                <hr class="border-warning">
        </form>
    @stop
    @section('Objetivos')
        <form action="" method="" data-toggle="validator">
            {{ csrf_field()}}
                <h6 class="modal-title text-center">OBJETIVOS</h6>
                <hr class="border-warning">
                    <div class="form-group">
                        <label class="font-weight-bolder">DESCRIPCION OBJETIVO</label>
                        <textarea type="text" name="descripcionObjetivo" class="form-control border-dark" placeholder="Escribir" required></textarea>
                    </div>
                <hr class="border-warning">
        </form>
    @stop

    

