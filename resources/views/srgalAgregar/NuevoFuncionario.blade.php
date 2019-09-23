@extends('admin.template.plantillaGenerica')
@section('title')
Nuevo Funcionarios
@stop
@section('pgai')
{{ action('ReporteController@index') }}
@stop

@section('contenido')
<form action="EditarFuncionario" method="POST" data-toggle="validator">
  {{ csrf_field()}}
    <div class="form-group">
            <label for="cedula">Cedula</label>
            <input type="text" name="cedula" class="form-control" placeholder="0-0000-0000" required="true">
    </div>
    <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" required="true">
    </div>
    <div class="form-group">
            <label for="priApellido">Primer Apellido</label>
            <input type="text" name="priApellido" class="form-control" placeholder="Apellido 1" required="true">
    </div>
    <div class="form-group">
        <label for="segApellido">Segundo Apellido</label>
        <input type="text" name="segApellido" class="form-control" placeholder="Apellido 2" required="true">
    </div>


  <div class="form-row">
        <div class="form-group col-md-6">
            <label for="email">Correo</label>
            <input type="email" name="correo" class="form-control" placeholder="correo@algo.com" required="true">
        </div>
        <div class="form-group col-md-6">
            <label for="telefono">Telefono</label>
            <input type="number-phone" name="telefono" class="form-control" placeholder="8888-8888" required="true">
        </div>
        <div class="form-group col-md-6">
            <label for="idPuesto">Seleccione el tipo de puesto</label>
            <select id="idPuesto" name="idPuesto" class="form-control" required="true">     
                <option value="{{null}}" selected>Tipos de Puesto</option>
                @foreach($puesto as $p)
                <option value="{{$p->idPuesto}}">{{ $p->nombrePuesto }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="guardar">Guardar todos los datos....</label>
            <button type="submit" name="btn" value="nuevo" class="btn btn-primary form-control bg-dark">Guardar</button>
        </div>
  </div> 
  </div>
</form>
@stop