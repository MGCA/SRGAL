<?php 
namespace App\TSQL;

class FuncionesTSQL{

    //STORE PROCEDURE CRUD de tabla Funcionarios
    public function crudFuncionario($cedula,$nombre,$priApellido,$segApellido,$correo,$telefono,$idPuesto,$accion){
        return \DB::select('CALL funcionarios_crud(?,?,?,?,?,?,?,?)', array($cedula,$nombre,$priApellido,$segApellido,$correo,$telefono,$idPuesto,$accion));
    }//STORE PROCEDURE CRUD de tabla Funcionarios
    //STORE PROCEDURE CRUD de tabla PUESTOS
    public function crudPuesto($idPuesto,$nombrePuesto,$accion){
        return \DB::select('CALL puestos_crud(?,?,?)', array($idPuesto,$nombrePuesto,$accion));
    }//STORE PROCEDURE CRUD de tabla PUESTOS

    //STORE PROCEDURE CRUD de tabla REPORTE
    public function crudReporte($aspectoAmbiental, $prioridad, $presupuesto, $fechaInicial, $fechaFinal, $metaAmbiental, $estado, $idReporte, $accion){
        return \DB::select('CALL reportes_crud(?,?,?,?,?,?,?,?,?)', array($aspectoAmbiental, $prioridad, $presupuesto, $fechaInicial, $fechaFinal, $metaAmbiental, $estado, $idReporte, $accion));
    }//STORE PROCEDURE CRUD de tabla REPORTE
    //STORE PROCEDURE CRUD de tabla ACTIVIDADAMBIENTAL
    public function crudActividadAmbiental($descripcionActividadAmbiental,$indicador,$recurso,$idActividadAmbiental,$idReporte,$accion){
        return \DB::select('CALL actividad_ambiental_crud(?,?,?,?,?,?)', array($descripcionActividadAmbiental,$indicador,$recurso,$idActividadAmbiental,$idReporte,$accion));
    }//STORE PROCEDURE CRUD de tabla ACTIVIDADAMBIENTAL
    //STORE PROCEDURE CRUD de tabla TIPOACTIVIDAD
    public function crudTipoActividad($nombreActividad,$idActividadAmbiental,$idTipoActividad,$accion){
        return \DB::select('CALL tipo_actividad_crud(?,?,?,?)', array($nombreActividad,$idActividadAmbiental,$idTipoActividad,$accion));
    }//STORE PROCEDURE CRUD de tabla TIPOACTIVIDAD
    //STORE PROCEDURE CRUD de tabla OBJETIVOS
    public function crudObjetivo($descripcionObjetivo,$idObjetivo,$idActividadAmbiental,$accion){
        return \DB::select('CALL objetivos_crud(?,?,?,?)', array($descripcionObjetivo,$idObjetivo,$idActividadAmbiental,$accion));
    }//STORE PROCEDURE CRUD de tabla OBJETIVOS
    //STORE PROCEDURE CRUD de tabla AVANCES
    public function crudAvance($descripcionAvance,$idAvance,$idTipoActividad,$accion){
        return \DB::select('CALL avances_crud(?,?,?,?)', array($descripcionAvance,$idAvance,$idTipoActividad,$accion));
    }//STORE PROCEDURE CRUD de tabla AVANCES
    //STORE PROCEDURE CRUD de tabla EVIDENCIAS
    public function crudEvidencia($nombreEvidencia,$tipoArchivo,$nombreArchivo,$idEvidencia,$idAvance,$accion){
        return \DB::select('CALL evidencias_crud(?,?,?,?,?,?)', array($nombreEvidencia,$tipoArchivo,$nombreArchivo,$idEvidencia,$idAvance,$accion));
    }//STORE PROCEDURE CRUD de tabla EVIDENCIAS
    //STORE PROCEDURE CRUD de tabla PRODUCTOS
    public function crudProducto($nombreProducto,$marca,$codigo,$requiereHojaSeguridad,$nombreArchivo,$tipoArchivo,$idProducto,$accion){
        return \DB::select('CALL producto_crud(?,?,?,?,?,?,?,?)', array($nombreProducto,$marca,$codigo,$requiereHojaSeguridad,$nombreArchivo,$tipoArchivo,$idProducto,$accion));
    }//STORE PROCEDURE CRUD de tabla PRODUCTOS
    //STORE PROCEDURE CRUD de tabla AREASCENTROFORMACION
    public function crudAreaCentroFormacion($nombreArea,$ubicacion,$idAreasCentroFormacion,$accion){
        return \DB::select('CALL areas_centro_formacion_crud(?,?,?,?)', array($nombreArea,$ubicacion,$idAreasCentroFormacion,$accion));
    }//STORE PROCEDURE CRUD de tabla AREASCENTROFORMACION
    //STORE PROCEDURE CRUD de tabla PRODUCTOAREASCENTROFORMACION
    public function crudProductoAreaCentroFormacion($idProducto,$idAreasCentroFormacion,$idProductoAreasCentroFormacion,$accion){
        return \DB::select('CALL producto_areas_centro_formacion_crud(?,?,?,?)', array($idProducto,$idAreasCentroFormacion,$idProductoAreasCentroFormacion,$accion));
    }//STORE PROCEDURE CRUD de tabla PRODUCTOSAREASCENTROFORMACION
    //STORE PROCEDURE CRUD de tabla GESTORESAUTORIZADOS
    public function crudGestoresAutorizados($nombreGestor,$telefonoGestor,$direccionGestor,$nombreContacto,$telefonoContacto,$correoContacto,$cedulaContacto,$tipoResiduo,$fechaVencimientoPermiso,$nombreArchivo,$tipoArchivo,$idGestoresAutorizados,$accion){
        return \DB::select('CALL gestores_autorizados_crud(?,?,?,?,?,?,?,?,?,?,?,?,?)', array($nombreGestor,$telefonoGestor,$direccionGestor,$nombreContacto,$telefonoContacto,$correoContacto,$cedulaContacto,$tipoResiduo,$fechaVencimientoPermiso,$nombreArchivo,$tipoArchivo,$idGestoresAutorizados,$accion));
    }//STORE PROCEDURE CRUD de tabla GESTORESAUTORIZADOS
    //STORE PROCEDURE CRUD de tabla DOCUMENTOSGENERALES
    public function crudDocumentosGenerales($nombreDocumento,$tipoEvidencia,$fechaCreacion,$nombreArchivo,$tipoArchivo,$idResponsable,$idDocumentosGenerales,$accion){
        return \DB::select('CALL documentos_generales_crud(?,?,?,?,?,?,?,?)', array($nombreDocumento,$tipoEvidencia,$fechaCreacion,$nombreArchivo,$tipoArchivo,$idResponsable,$idDocumentosGenerales,$accion));
    }//STORE PROCEDURE CRUD de tabla DOCUMENTOSGENERALES
    
       

    //AREA DE VISTAS
    public function getListarFuncionario(){
        return \DB::select('select * from view_listar_funcionarios');
    }
    public function getListarReportes(){
        return \DB::select('select * from view_listar_reportes');
    }

    public function getListarActividadAmbiental(){
        return \DB::select('select * from view_actividad_ambiental');
    }
    
    public function getListarPuestos(){
        return \DB::select('select * from view_mostrar_tipos_puesto');
    }
    public function getListarTipoActividad(){
        return \DB::select('select * from view_listar_tipo_actividad');
    }
    public function getListarAvance(){
        return \DB::select('select * from view_listar_avances');
    }
    public function getListarProductos(){
        return \DB::select('select * from view_listar_productos');
    }
    public function getListarAreaCentroFormacion(){
        return \DB::select('select * from view_listar_areas_centro_formacion');
    }
    public function getListarDocumentosGenerales(){
        return \DB::select('select * from view_listar_documentos_generales');
    }
    

}
?>