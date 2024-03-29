<?php

namespace App\Http\Controllers;

use App\Evidencia;
use Illuminate\Http\Request;
use App\TSQL\FuncionesTSQL;

class EvidenciaController extends Controller
{
    //

    protected $FuncionesTSQL;
    public function __construct(FuncionesTSQL $FuncionesTSQL){
        $this->FuncionesTSQL = $FuncionesTSQL;
        //
        $this->middleware('auth');
    }

    public function index(){

        $sql = $this->FuncionesTSQL->crudEvidencia('','','',1,'consultar');
        return view('srgalListar/VerReporteCompleto')->with('evidencia',$sql);
    }

}
