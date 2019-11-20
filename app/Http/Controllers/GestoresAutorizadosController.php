<?php

namespace App\Http\Controllers;

use App\TSQL\FuncionesTSQL;
use Illuminate\Http\Request;
//
use Dompdf\Dompdf;

class GestoresAutorizadosController extends Controller
{
    //
    protected $FuncionesTSQL;
    public function __construct(FuncionesTSQL $FuncionesTSQL){
        $this->FuncionesTSQL = $FuncionesTSQL;
        //
        $this->middleware('auth');
    }

    public function index(){
        return view('srgalAgregar/GestoresAutorizados');
    }

    public function AccionGestoresAutorizados(Request $request){


            $nombreGestor = $request -> nombreGestor;
            $telefonoGestor = $request -> telefonoGestor;
            $direccionGestor = $request -> direccionGestor;
            $nombreContacto = $request -> nombreContacto;
            $telefonoContacto = $request -> telefonoContacto;
            $correoContacto = $request -> correoContacto;
            $cedulaContacto = $request -> cedulaContacto;
            $tipoResiduo = $request -> tipoResiduo;
            $fechaVencimientoPermiso = $request -> fechaVencimientoPermiso;

            if(empty($_FILES['documentoPermiso']['tmp_name'])){
                $documentoPermiso = null;
                $nombreArchivo = null;
                $tipoArchivo = null;
            }else{
                $permitidos = array("image/jpg","image/jpeg","image/png","application/pdf","application/docx","application/docs");
                if(in_array($_FILES['documentoPermiso']['type'], $permitidos)){
                    $nombreArchivo = $_FILES["documentoPermiso"]["name"];
                    $tipoArchivo = $_FILES["documentoPermiso"]["type"];
                    $documentoPermiso = file_get_contents($_FILES['documentoPermiso']['tmp_name']);
                    
                    $sql = $this->FuncionesTSQL->crudGestoresAutorizados($nombreGestor,$telefonoGestor,$direccionGestor,$nombreContacto,$telefonoContacto,$correoContacto,$cedulaContacto,$tipoResiduo,$fechaVencimientoPermiso,$nombreArchivo,$tipoArchivo,null,'nuevo');

                    $consulta = array_values($sql)[0];

                    $rutaCarpeta = "archivos/gestoresAutorizados/$consulta->id/"; // Rura en la carpeta public donde estaran los archivos
                    if(!file_exists($rutaCarpeta))
                    {
                        mkdir($rutaCarpeta);
                    }
                    if(!file_exists($nombreArchivo)){
                        move_uploaded_file($_FILES['documentoPermiso']['tmp_name'],"$rutaCarpeta".$nombreArchivo);
                        
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
}