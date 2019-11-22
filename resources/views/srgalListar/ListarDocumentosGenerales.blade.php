@extends('admin.template.plantillaGenerica')
@section('title')
Listar Documentos Generales
@stop
@section('pgai')
{{ action('DocumentosGeneralesController@index') }}
@stop



@section('contenido')
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
      <!--Table-->
      <table class="table table-striped w-auto container">

        <!--Table head-->
        <thead class="bg-dark text-warning">
          <tr>
            <th >ID</th>
            <th >Nombre Documento</th>
            <th >Tipo de Evidencia</th>
            <th >Fecha de Creacion</th>
            <th >Responsable</th>
            <th >Accion</th>
          </tr>
        </thead>
        <!--Table head-->

        <!--Table body-->
        <tbody>
        @foreach($ListaDocumentosGenerales as $listaDocGen)
            <tr class="table-info border border-warning">
              <th scope="row" class="bg-light border border-dark">{{$listaDocGen->idDocumentosGenerales}}</th>
              <td class="bg-light border border-dark">{{$listaDocGen->nombreDocumento}}</td>
              <td class="bg-light border border-dark">{{$listaDocGen->tipoEvidencia}}</td>
              <td class="bg-light border border-dark">{{$listaDocGen->fechaCreacion}}</td>
              <td class="bg-light border border-dark">{{$listaDocGen->idResponsable}}</td>
              <td class="bg-light border border-dark">
                <a href="/archivos/documentosGenerales/{{$listaDocGen->idDocumentosGenerales}}/{{$listaDocGen->nombreArchivo}}" download="{{$listaDocGen->nombreArchivo}}">
                    <button type="submit" class="btn btn-secondary">DESCARGAR</button>
                </a>
                <a href="#">
                    <button type="submit" class="btn btn-secondary">BORRAR</button>
                </a>
              </td>
            </tr> 
        @endforeach
        </tbody>
        <!--Table body-->

      </table>
      <!--Table-->
        <!-- style=" position: fixed; right: 10px; top: 20px; z-index: 2000" -->
@stop



