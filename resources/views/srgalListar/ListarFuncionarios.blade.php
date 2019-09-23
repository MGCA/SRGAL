@extends('admin.template.plantillaGenerica')
@section('title')
Lista de Funcionarios
@stop
@section('pgai')
{{ action('ReporteController@index') }}
@stop



@section('contenido')
  <form action="EditarFuncionario" method="POST">
  {{ csrf_field() }}
  <div class="float-right" style=" position: fixed; right: 10px; z-index: 2000" >
          <button type="submit" name="btn" value="insertar" class="btn btn-secondary bg-dark btn-block form-control" style="width: 100px">
            Agregar
          </button>
          <button type="submit" name="btn" value="consultar" class="btn btn-secondary bg-dark btn-block form-control" style="width: 100px">
            Editar
          </button>
          <button type="submit" name="btn" value="borrar" class="btn btn-secondary bg-dark btn-block form-control" style="width: 100px">
            Borrar
          </button>  
      </div>
    
      <!--Table-->
      <table class="table table-striped w-auto container">

        <!--Table head-->
        <thead class="bg-dark text-warning">
          <tr>
            <th >...</th>
            <th >Nª</th>
            <th >Cedula</th>
            <th >Nombre</th>
            <th >Apellidos</th>
            <th >Correo</th>
            <th >Telefono</th>
            <th >Puesto</th>
          </tr>
        </thead>
        <!--Table head-->

        <!--Table body-->
        <tbody>
          @foreach($funcionario as $f)
            <tr class="table-info border border-warning">
              <td class="bg-light border border-dark">
                <div class="container">
                  <input type="radio" class="form-check-input" name="idFuncionario" value="{{$f->cedula}}">
                </div> 
              </td>
              <th scope="row" class="bg-light border border-dark">{{$f->idFuncionario}}</th>
              <td class="bg-light border border-dark">{{$f->cedula}}</td>
              <td class="bg-light border border-dark">{{$f->nombre}}</td>
              <td class="bg-light border border-dark">{{$f->priApellido}} {{$f->segApellido}}</td>
              <td class="bg-light border border-dark">{{$f->correo}}</td>
              <td class="bg-light border border-dark">{{$f->telefono}}</td>
              <td class="bg-light border border-dark">{{$f->idPuesto}}</td>
            </tr>
          @endforeach
        </tbody>
        <!--Table body-->

      </table>
      <!--Table-->
        <!-- style=" position: fixed; right: 10px; top: 20px; z-index: 2000" -->
       
  </form>
@stop



