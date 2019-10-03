@extends('admin.template.plantillaNuevoReporte')

    @section('EncabezadoReporte')
        <form method="" data-toggle="validator">
            {{ csrf_field()}}
            <h6 class="modal-title text-center">REPORTE</h6>
            <hr class="border-warning">
            <div class="row">
                <div class="col-6 form-group">
                    <label class="font-weight-bolder">ASPECTO AMBIENTAL</label>
                    <textarea type="text" class="form-control border-dark" placeholder="Escribir"></textarea>
                </div>
                <div class="col-6 form-group">
                    <label class="font-weight-bolder">PRIODIDAD</label>
                    <select id="idPuesto" name="idPuesto" class="form-control border-dark" required="true">     
                        <option value="{{null}}" selected>--SELECCIONE--</option>
                        <option value="">Baja</option>
                        <option value="">Media</option>
                        <option value="">Alta</option>
                    </select>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-4 form-group">
                    <label class="font-weight-bolder">FECHA INICIAL</label>
                    <input type="text" class="form-control border-dark" placeholder="Escribir">
                </div>
                <div class="col-4 form-group">
                    <label class="font-weight-bolder">FECHA FINAL</label>
                    <input type="text" class="form-control border-dark" placeholder="Escribir">
                </div>
                <div class="col-4 form-group">
                    <label class="font-weight-bolder">ESTADO</label>
                    <div class="progress" style="height:55%">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                    <label class="font-weight-bolder">META AMBIENTAL</label>
                    <textarea type="text" class="form-control border-dark" placeholder="Escribir"></textarea>
            </div>
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
                        <div class="float-right">
                            <button type="button" name="btn" value="insertar" data-toggle="modal" data-target="#exampleModal" class="btn btn-secondary bg-dark btn-block form-control" style="width: 100px">
                                Agregar
                            </button>
                            <button type="button" name="btn" value="consultar" data-toggle="modal" data-target="#exampleModal1" class="btn btn-secondary bg-dark btn-block form-control" style="width: 100px">
                                Editar
                            </button>
                            <button type="button" name="btn" value="borrar" class="btn btn-secondary bg-dark btn-block form-control" style="width: 100px">
                                Borrar
                            </button>
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
                            <!-- editar  -->
                            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title font-weight-bold" id="exampleModalLabel1">EDITAR TIPO DE ACTIVIDAD</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container border border-dark bg-light">
                                                <form action="EditarReporte" method="POST" data-toggle="validator">
                                                    {{ csrf_field()}}
                                                    <div class="form-group text-center">
                                                        <label class="font-weight-bold">EDITE EL TIPO DE ACTIVIDAD</label>                  
                                                        <input type="text" value="" class="form-control text-center" readonly>                           
                                                        <input type="text" name="nomActividad" class="form-control text-center" aria-describedby="Ingrese un tipo de actividad" placeholder="------NUEVO------" required="true">
                                                        <small id="puestoHelp" class="form-text text-muted">Escriba el nuevo tipo de actividad.</small>
                                                    </div>
                                                </form>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" name="btn" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                                            <button type="submit" value="editar" name="btn" class="btn btn-secondary">GUARDAR</button>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="col-8">
                            <select id="idTipoActividad" name="idTipoActividad" class="form-control border-dark" required="true">     
                                <option selected>--SELECCIONE--</option>
                                @foreach($tipoActividad as $t)
                                <option value="{{$t->idTipoActividad}}">{{$t->nombreActividad}}</option>
                                @endforeach
                            </select>
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

                <hr class="border-warning">
        </form>
    @stop
    

