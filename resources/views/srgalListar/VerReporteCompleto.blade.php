@extends('admin.template.plantillaGenerica')
@section('title')
Ver Reporte Completo
@stop
@section('pgai')
{{ action('ReporteController@index') }}
@stop



@section('contenido')
    @foreach($evidencia as $e)
        <div class="form-group">
            <label>Nombre Evidencia:{{$e->nombreEvidencia}}</label>
            <img src="data:image/png;base64,{{base64_encode($e->archivo)}}" alt="{{$e->nombreArchivo}}" style=" height:100px; width:100px; ">
        </div>
    @endforeach
@stop



