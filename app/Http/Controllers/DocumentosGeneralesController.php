<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use App\TSQL\FuncionesTSQL;
use Illuminate\Http\Request;
//
use Dompdf\Dompdf;

class DocumentosGeneralesController extends Controller
{
    //
    protected $FuncionesTSQL;
    public function __construct(FuncionesTSQL $FuncionesTSQL){
        $this->FuncionesTSQL = $FuncionesTSQL;
        //
        $this->middleware('auth');
    }

    public function index(){
        return view('srgalAgregar/DocumentosGenerales');
    }

    public function ListarDocumentosGenerales(){
        $getListarDocumentosGenerales = $this->FuncionesTSQL->getListarDocumentosGenerales();
        return view('srgalListar/ListarDocumentosGenerales')->with('ListaDocumentosGenerales',$getListarDocumentosGenerales);
    }

    public function AccionDocumentosGenerales(Request $request){

        if($request->btn == 'guardarDocumentosGenerales'){ //$request es la variable por donde identamos la variable name de la vista
            //ListarDocumentosGenerales variable "name" de las etiquetas de html
            $nombreDocumento = $request->nombreDocumento;//datos desde el POST
            $tipoEvidencia = $request->tipoEvidencia;
            $fechaCreaccion =$request->fechaCreacion;
            
            $idResponsable = $request->idResponsable;//datos desde el POST


            if(empty($_FILES['archivoDocumentoGeneral']['tmp_name'])){//Si NO contiene informacion el archivo
                $archivoDocumentoGeneral = null;// null evitara el error de php
                $tipoArchivo = null;
            }else{//condicion si hay un archivo
                //Tipos de archivos que se puede subir Array
                $permitidos = array("image/jpg","image/jpeg","image/png","application/pdf","application/docx","application/docs");
                if(in_array($_FILES['archivoDocumentoGeneral']['type'], $permitidos)){                    
                    $archivoDocumentoGeneral = file_get_contents($_FILES['archivoDocumentoGeneral']['tmp_name']);  
                    $tipoArchivo = $_FILES['archivoDocumentoGeneral']['type'];//seteamos el tipo de archivo a la variable
                    $nombreArchivo = $_FILES['archivoDocumentoGeneral']['name'];

                    //procedimiento de almacenado llamado de la carpeta TSQL
                    $sql = $this->FuncionesTSQL->crudDocumentosGenerales($nombreDocumento,$tipoEvidencia,$fechaCreaccion,$nombreArchivo,$tipoArchivo,$idResponsable,null,'nuevo');

                    $consulta = array_values($sql)[0]; // cargamos todo el objeto obtenido de la consulta 
                    //SQL en la posicion 0 de el array creado

                    $rutaCarpeta = "archivos/documentosGenerales/$consulta->id/"; // Rura en la carpeta public donde estaran los archivos
                    if(!file_exists($rutaCarpeta))
                    {
                        mkdir($rutaCarpeta);
                    }
                    if(!file_exists($nombreArchivo)){
                        move_uploaded_file($_FILES['archivoDocumentoGeneral']['tmp_name'],"$rutaCarpeta".$nombreArchivo);
                        
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
        }else{
            foreach($sql as $g){
                if(isset($g->mensaje)){
                    return redirect()->back() ->with('alert', $g->mensaje);
                }
            }      
        }

    }

    public function DescargarDocumentoGeneral(Request $request){

        // if($request->btn == 'consultar'){

        $idDocumentoGeneral = $request->idDocumentosGenerales;
        
        $consulta = $this->FuncionesTSQL->crudDocumentosGenerales(null,null,null,null,null,null,$idDocumentoGeneral,'consultar');
        $archivo = array_values($consulta)[0];

        // }
        // else{
            
        //     $mensaje = 'Error: else';
        //     return redirect()->back() ->with('mensaje', $mensaje);
        // }


    }
}