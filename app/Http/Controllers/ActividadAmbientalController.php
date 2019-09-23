<?php

namespace App\Http\Controllers;

use App\ActividadAmbiental;
use Illuminate\Http\Request;

class ActividadAmbientalController extends Controller
{
    //

    public function vista(){
        return view('No se creado la vista en View');
    }

    public function create(Request $request){
        $actividadAmbiental = new ActividadAmbiental();

        $actividadAmbiental -> descripcionActividadAmbiental = $request -> descripcionActividadAmbiental;
        $actividadAmbiental -> idTipoActividad = $request -> idTipoActividad;
        $actividadAmbiental -> indicador = $request -> indicador;
        $actividadAmbiental -> recurso = $request -> recurso;

        $actividadAmbiental -> save();

        return redirect('/create');
    }
}
