@extends('admin.template.plantillaGenerica')
@section('title')
Nuevo Puesto
@stop
@section('pgai')
{{ action('ReporteController@index') }}
@stop

@section('contenido')
    <div class="container col-5 border border-dark bg-light">
        <form action="EditarPuesto" method="POST" data-toggle="validator">
            {{ csrf_field()}}
            <div class="form-group text-center">
                <label class="font-weight-bold">INGRESE UN NUEVO PUESTO</label>
                <input type="text" name="nombrePuesto" class="form-control text-center" aria-describedby="Ingrese un nuevo puesto" placeholder="------ESCRIBIR------" required>
                <small id="puestoHelp" class="form-text text-muted">Escriba el nuevo puesto de trabajo.</small>
            </div>
            <button type="submit" name="btn" value="nuevo" class="btn btn-dark text-warning container">GUARDAR</button>
        </form>
        <br>
    </div>
@stop