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
    //STORE PROCEDURE CRUD de tabla TIPOACTIVIDAD
    public function crudTipoActividad($idTipoActividad,$nombreActividad,$accion){
        return \DB::select('CALL tipo_actividad_crud(?,?,?)', array($idTipoActividad,$nombreActividad,$accion));
    }//STORE PROCEDURE CRUD de tabla TIPOACTIVIDAD
    //STORE PROCEDURE CRUD de tabla REPORTE
    public function crudReporte($aspectoAmbiental, $prioridad, $presupuesto, $fechaInicial, $fechaFinal, $metaAmbiental, $estado, $idReporte, $accion){
        return \DB::select('CALL reportes_crud(?,?,?,?,?,?,?,?,?)', array($aspectoAmbiental, $prioridad, $presupuesto, $fechaInicial, $fechaFinal, $metaAmbiental, $estado, $idReporte, $accion));
    }//STORE PROCEDURE CRUD de tabla REPORTE

    public function getListarFuncionario(){
        return \DB::select('select * from view_listar_funcionarios');
    }
    public function getListarPuestos(){
        return \DB::select('select * from view_mostrar_tipos_puesto');
    }
    public function getListarTipoActividad(){
        return \DB::select('select * from view_listar_tipo_actividad');
    }
}
?>