<?php

namespace App\Http\Controllers;

use App\ActividadAmbientalObjetivo;
use Illuminate\Http\Request;

class ActividadAmbientalObjetivoController extends Controller
{
    //
    public function vista(){
        return view('No esta creado la vista en el View');
    }

    public function create(Request $request){
        $actividadAmbientalObjetivo = new ActividadAmbientalObjetivo();
        
        $actividadAmbientalObjetivo -> idActividadAmbiental = $request -> idActividadAmbiental;
        $actividadAmbientalObjetivo -> idObjetivo = $request -> idObjetivo;
        $actividadAmbientalObjetivo -> save();

        return redirect('/create');

    }
}
