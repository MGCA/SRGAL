<?php

namespace App\Http\Controllers;

use App\Objetivo;
use Illuminate\Http\Request;

class ObjetivoController extends Controller
{
    //
    public function vista(){
        return view('No se ha creado la vista');
    }

    public function create(Request $request){
        $objetivo = new Objetivo();

        $objetivo -> descripcion = $request -> descripcion;

        $objetivo -> save();

        return redirect('/create');
    }
}
