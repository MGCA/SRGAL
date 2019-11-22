<?php

namespace App\Http\Controllers;

use App\TSQL\FuncionesTSQL;
use Illuminate\Http\Request;
//
use Dompdf\Dompdf;

class DepartamentoHojasSeguridadController extends Controller
{
    //
    protected $FuncionesTSQL;
    public function __construct(FuncionesTSQL $FuncionesTSQL){
        $this->FuncionesTSQL = $FuncionesTSQL;
        //
        $this->middleware('auth');
    }

    public function index(){
        $listaProductos = $this->FuncionesTSQL->getListarProductos();
        $listaAreaCentroFormacion =  $this->FuncionesTSQL->getListarAreaCentroFormacion();
        return view('srgalAgregar/DepartamentoHojasSeguridad')->with('listaProductos', $listaProductos)->with('listaAreaCentroFormacion', $listaAreaCentroFormacion);
    }

    public function AccionDepartamentHojasSeguridad(Request $request){
        
        if($request->btn == 'guardarHojasSeguridad'){

            $nombreProducto = $request -> nombreProducto;
            $marca = $request -> marca;
            $codigo = $request -> codigo;
            $requiereHojaSeguridad = $request -> requiereHojaSeguridad;
            if(empty($_FILES['archivoHojaSeguridad']['tmp_name'])){
                $archivoHojaSeguridad = null;
                $nombreArchivo = null;
                $tipoArchivo = null;
            }else{
                $permitidos = array("image/jpg","image/jpeg","image/png","application/pdf","application/docx","application/docs");
                if(in_array($_FILES['archivoHojaSeguridad']['type'], $permitidos)){
                    $nombreArchivo = $_FILES["archivoHojaSeguridad"]["name"];
                    $tipoArchivo = $_FILES["archivoHojaSeguridad"]["type"];
                    $archivoHojaSeguridad = file_get_contents($_FILES['archivoHojaSeguridad']['tmp_name']);
                    
                    $sql = $this->FuncionesTSQL->crudProducto($nombreProducto,$marca,$codigo,$requiereHojaSeguridad,$nombreArchivo,$tipoArchivo,null,'nuevo');
                   
                    $consulta = array_values($sql)[0];

                    $rutaCarpeta = "archivos/hojasSeguridad/$consulta->id/"; // Rura en la carpeta public donde estaran los archivos
                    if(!file_exists($rutaCarpeta))
                    {
                        mkdir($rutaCarpeta);
                    }
                    if(!file_exists($nombreArchivo)){
                        move_uploaded_file($_FILES['archivoHojaSeguridad']['tmp_name'],"$rutaCarpeta".$nombreArchivo);
                        
                        // imprime resultado de la BD $consulta
                        return redirect()->back() ->with('alert', $consulta->mensaje);
                    }else{
                        $mensaje = 'El archivo ya existe, o tiene el mismo nombre';
                    return redirect()->back() ->with('alert', $mensaje);
                    }

                }else{
                    $mensaje = 'archivo no permitido';
                    return redirect()->back() ->with('alert', $mensaje);
                }
            }
            
            foreach($sql as $g)
            if(isset($g->mensaje)){
                return redirect()->back() ->with('alert', $g->mensaje);
            }
        }

        if($request->btn == 'guardarAreasCentroFormacion'){
            $nombreArea = $request -> nombreArea;
            $ubicacion = $request -> ubicacion;
            
            $sql = $this->FuncionesTSQL->crudAreaCentroFormacion($nombreArea,$ubicacion,null,'nuevo');

            foreach($sql as $g)
            if(isset($g->mensaje)){
                return redirect()->back() ->with('alert', $g->mensaje);
            }
        }

        if($request->btn == "guardarHojasAreas"){
            $idProducto = $request -> idProducto;
            $idAreasCentroFormacion = $request -> idAreasCentroFormacion; 

            $sql = $this->FuncionesTSQL->crudProductoAreaCentroFormacion($idProducto,$idAreasCentroFormacion,null,'nuevo');

            foreach($sql as $g)
            if(isset($g->mensaje)){
                return redirect()->back() ->with('alert', $g->mensaje);
            }


        }
        

    }
    public function cargarAreasConHojas(){
        return $listaAreas = $this->FuncionesTSQL->crudAreaCentroFormacion('','',$id,'consultar');
    }
    
}