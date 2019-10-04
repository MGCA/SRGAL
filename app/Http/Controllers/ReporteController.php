<?php

namespace App\Http\Controllers;

use App\Reporte;
use App\TSQL\FuncionesTSQL;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    //
    protected $FuncionesTSQL;
    public function __construct(FuncionesTSQL $FuncionesTSQL){
        $this->FuncionesTSQL = $FuncionesTSQL;
        //
        $this->middleware('auth');
    }

    public function index(){
        return view('GestionPgai');
    }
    
    public function NuevoReporte(){
        $tipoActividad = $this->FuncionesTSQL->getListarTipoActividad();
        return view('srgalAgregar/NuevoReporte')->with('tipoActividad',$tipoActividad);
    }

    public function AccionReporte(Request $request){

        if($request -> btn == 'nuevo'){                   
           $idTipoActividad = null;
           $nombreActividad = $request -> nombreActividad;
            $sql = $this->FuncionesTSQL->crudTipoActividad($idTipoActividad,$nombreActividad,$request -> btn);
        return $this -> NuevoReporte();
        }

        if($request -> btn == 'consultar'){                   
            $idTipoActividad = $request -> idTipoActividad;
            $nombreActividad = "";
             $sql = $this->FuncionesTSQL->crudTipoActividad($idTipoActividad,$nombreActividad,$request -> btn);
             return view('mensaje')->with('mensaje', $sql);
         }

    }

}
