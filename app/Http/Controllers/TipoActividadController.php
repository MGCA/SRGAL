<?php

namespace App\Http\Controllers;

use App\TipoActividad;
use App\TSQL\FuncionesTSQL;
use Illuminate\Http\Request;

class TipoActividadController extends Controller
{
    //
    protected $FuncionesTSQL;
    public function __construct(FuncionesTSQL $FuncionesTSQL){
        $this->FuncionesTSQL = $FuncionesTSQL;
        //
        $this->middleware('auth');
    }

    public function vista(){
        return view('No se a creado la vista en View');
    }

    public function AccionTipoActividad(Request $request){
        $btn = $request -> btn;

        if($request -> btn == 'nuevo'){
            $idTipoPuesto = '';                   
            $nombreActividad = $request -> nombreActividad;
            $sql = $this->FuncionesTSQL->crudTipoActividad('','',$btn);
        return view('mensaje')->with('mensaje', $sql);
        }

        if($request -> btn == 'insertar'){                   
            return view('');
        }


        if($request -> btn == 'editar'){
            $idTipoActividad = $request -> idTipoActividad;
            $nombreActividad = $request -> nombreActividad;
            $sql = $this->FuncionesTSQL->crudTipoActividad('','',$btn);
            return view('mensaje')->with('mensaje', $sql);     
        }

        if($request -> btn == 'consultar'){
            $idTipoActividad = $request -> idTipoActividad;
            $nombreActividad = $request -> nombreActividad;
            $sql = $this->FuncionesTSQL->crudPucrudTipoActividadesto($idActividad,'',$btn);
            return view('mensaje')->with('mensaje', $sql);

        }

        if($request -> btn == 'borrar'){
            $idTipoActividad = $request -> idTipoActividad;
            $nombreActividad = $request -> nombreActividad;
            $sql = $this->FuncionesTSQL->crudTipoActividad($idTipoActividad,'',$btn);
            return view('mensaje')->with('mensaje', $sql);
        }

    }
}
