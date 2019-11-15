
@extends('admin.template.plantillaGenerica')
@section('title')
Listar Puestos
@stop
@section('pgai')
{{ action('ReporteController@index') }}
@stop

@section('contenido')
  <script>//Ventana alert que imprime el resultado SQL que devuelve el controlador  -->
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>

    Formulario
  <form action="EditarPuesto" method="POST">
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
          <th>...</th>
          <th>Nª</th>
          <th>Nombre Puesto</th>
        </tr>
      </thead>
      <!--Table head-->

      <!--Table body-->
      <tbody>
          @foreach($puesto as $p)
            <tr class="table-info border border-warning">
              <td class="bg-light border border-dark">
                <div class="container">
                  <input type="radio" class="form-check-input" name="idPuesto" value="{{$p->idPuesto}}">
                </div> 
              </td class="bg-light border border-dark">
              <th scope="row" class="bg-light border border-dark">{{$p->idPuesto}}</th>
              <td class="bg-light border border-dark">{{$p->nombrePuesto}}</td>
            </tr>
            @endforeach
          </tbody>
          <!--Table body-->
    </table>
    <!--Table-->
  </form>
@stop
