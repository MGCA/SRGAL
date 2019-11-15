<?php

namespace App\Http\Controllers;

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

    public function AccionDocumentosGenerales(Request $request){

        if($request->btn == 'guardarDocumentosGenerales'){


            $nombreDocumento = $request->nombreDocumento;
            $tipoEvidencia = $request->tipoEvidencia;
            $fechaCreaccion =$request->fechaCreacion;
            if(empty($_FILES['archivoDocumentoGeneral']['tmp_name'])){
                $archivoDocumentoGeneral = null;
            }else{
            $archivoDocumentoGeneral = file_get_contents($_FILES['archivoDocumentoGeneral']['tmp_name']);  
            }
            $idResponsable = $request->idResponsable;


            $sql = $this->FuncionesTSQL->crudDocumentosGenerales($nombreDocumento,$tipoEvidencia,$fechaCreaccion,$archivoDocumentoGeneral,$idResponsable,null,'nuevo');
            
            foreach($sql as $g)
            if(isset($g->mensaje)){
                return redirect()->back() ->with('alert', $g->mensaje);
            }
        }
    }
}