@extends('admin.template.plantillaGenerica')

@section('title')
Funcionarios
@stop
@section('pgai')
{{ action('ReporteController@index') }}
@stop
@section('uno')
Agregar
@stop
@section('dos')
Listar
@stop
@section('tres')
Borrar
@stop
@section('item1')
Agregar
@stop
@section('item2')
ListarFuncionarios
@stop
@section('contenido')
<br>
<div class="jumbotron">
    Bienvenidos al Programa de Registro de la Gestion Ambiental Liberia, INA 2019
</div>

@stop