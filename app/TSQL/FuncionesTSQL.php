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
    public function crudEvidencia($nombreEvidencia,$archivo,$nombreArchivo,$idEvidencia,$idAvance,$accion){
        return \DB::select('CALL evidencias_crud(?,?,?,?,?,?)', array($nombreEvidencia,$archivo,$nombreArchivo,$idEvidencia,$idAvance,$accion));
    }//STORE PROCEDURE CRUD de tabla EVIDENCIAS    

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
}
?>