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
    }

    public function index(){
        return view('GestionPgai');
    }
    
    public function NuevoReporte(){
        $tipoActividad = $this->FuncionesTSQL->getListarTipoActividad();
        return view('srgalAgregar/NuevoReporte')->with('tipoActividad',$tipoActividad);
    }

    public function AccionReporte(Request $request){

    }
}
