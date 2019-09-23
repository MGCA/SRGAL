@extends('admin.template.plantillaGenerica')
@section('title')
Editar Funcionario
@stop
@section('pgai')
{{ action('ReporteController@index') }}
@stop

@section('contenido')
    @foreach($idFuncionario as $f)
        <form action="EditarFuncionario" method="POST" data-toggle="validator">
            {{ csrf_field()}}
            <div class="form-row">
                <div class="form-group col-sm-3">
                    <label for="">Nombre: {{$f->nombre}} {{$f->priApellido}} {{$f->segApellido}} :</label>   
                    <input type="text" name="idFuncionario" value="{{$f->cedula}}" class="form-control" 
                    placeholder="0-0000-0000" required="true">
                </div>
                <div class="form-group col-sm-3">
                    <label for="">{{$f->idPuesto}}</label> 
                    <button type="submit" name="btn" value="consultar" class="btn btn-secondary bg-dark btn-block form-control" style="width: 100px">
                        Obtener
                    </button>
                </div>
            </div>
        </form>
        <form action="EditarFuncionario" method="POST" data-toggle="validator">
            {{ csrf_field()}}
            <!--Aqui comienza -->
            <div class="form-group">
                <label for="cedula">Cedula</label>
                <input type="text" name="cedula" value="{{$f->cedula}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" value="{{$f->nombre}}" class="form-control" placeholder="Nombre" required="true">
            </div>
            <div class="form-group">
                <label for="priApellido">Primer Apellido</label>
                <input type="text" name="priApellido" value="{{$f->priApellido}}" class="form-control" placeholder="Apellido 1" required="true">
            </div>
            <div class="form-group">
                <label for="segApellido">Segundo Apellido</label>
                <input type="text" name="segApellido" value="{{$f->segApellido}}" class="form-control" placeholder="Apellido 2" required="true">
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Correo</label>
                    <input type="email" name="correo" value="{{$f->correo}}" class="form-control" placeholder="correo@algo.com" required="true">
                </div>
                <div class="form-group col-md-6">
                    <label for="telefono">Telefono</label>
                    <input type="number-phone" name="telefono" value="{{$f->telefono}}" class="form-control" placeholder="8888-8888" required="true">
                </div>
                <div class="form-group col-md-6">
                    <label for="idPuesto">Puesto Actual: {{$f->idPuesto}}</label>
                    <select id="idPuesto" name="idPuesto" class="form-control" required="true">     
                        <option value="{{null}}" selected>Seleccion de otro puesto</option>
                        @foreach($puesto as $p)
                        <option value="{{$p->idPuesto}}">{{ $p->nombrePuesto }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="guardar">Confirme para actualizar los datos....</label>
                    <button type="submit" name="btn" value="editar" class="btn btn-primary form-control bg-dark">Actualizar</button>
                </div>
            </div> 
            </div>
        </form>
    <!-- Aqui termina -->
    @endforeach
    
@stop