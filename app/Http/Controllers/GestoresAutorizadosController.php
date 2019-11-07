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
            }else{
            $documentoPermiso = file_get_contents($_FILES['documentoPermiso']['tmp_name']);  
            }

            $sql = $this->FuncionesTSQL->crudGestoresAutorizados($nombreGestor,$telefonoGestor,$direccionGestor,$nombreContacto,$telefonoContacto,$correoContacto,$cedulaContacto,$tipoResiduo,$fechaVencimientoPermiso,$documentoPermiso,null,'nuevo');
            
            foreach($sql as $g)
            if(isset($g->mensaje)){
                return redirect()->back() ->with('alert', $g->mensaje);
            }
    }
}