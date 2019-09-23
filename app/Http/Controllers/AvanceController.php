<?php

namespace App\Http\Controllers;

use App\Avance;
use Illuminate\Http\Request;

class AvanceController extends Controller
{
    //
    public function vista(){
        return view('No se ha creado la vista en View');
    }

    public function create(Request $request){
        $avance = new Avance();

        $avance -> descripcionAvance = $request -> descripcionAvance;
        $avance -> idEvidencia = $request -> idEvidencia;

        $avance -> save();

        return redirect('/create');
    }
}
