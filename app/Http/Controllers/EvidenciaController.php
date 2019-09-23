<?php

namespace App\Http\Controllers;

use App\Evidencia;
use Illuminate\Http\Request;

class EvidenciaController extends Controller
{
    //

    public function vista(){
        return view('No se ha creado la vista en View');
    }

    public function create(Request $request){
        $evidencia = new Evidencia();

        $evidencia -> nombreEvidencia = $request -> nombreEvidencia;
        $evidencia -> save();

        return redirect('/create');
    }
}
