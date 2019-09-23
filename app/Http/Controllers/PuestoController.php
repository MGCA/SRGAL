<?php

namespace App\Http\Controllers;

use App\Puesto;
use App\TSQL\FuncionesTSQL;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    //
    protected $FuncionesTSQL;
    public function __construct(FuncionesTSQL $FuncionesTSQL){
        $this->FuncionesTSQL = $FuncionesTSQL;
    }

    public function vista(){
        return view('/');
    }
    
    public function create(Request $request){
        $puesto = Puesto();

        $puesto -> nombrePuesto = $request -> nombrePuesto;
        $funcionario -> save();

        return redirect('/create');

    }

    public function getIndex(){
        $puesto = Puesto::all();
        return view('srgalAgregar/NuevoFuncionario')->with('puesto', $puesto);
    }

    public function ListarPuestos(){
        $puesto = $this->FuncionesTSQL->getListarPuestos();
        return view('srgalListar/ListarPuestos')->with('puesto',$puesto);
    }

   public function puestos(){
        return $puestos = $this->FuncionesTSQL->getListarPuestos();
    }


//S-P CRUD Funcionarios
   public function AccionPuesto(Request $request){
        $btn = $request -> btn;

        if($request -> btn == 'nuevo'){
            $idPuesto = '';                   
            $nombrePuesto = $request -> nombrePuesto;
            $sql = $this->FuncionesTSQL->crudPuesto($idPuesto,$nombrePuesto,$btn);
        return view('mensaje')->with('mensaje', $sql);
        }

        if($request -> btn == 'insertar'){                   
            return view('srgalAgregar/NuevoPuesto');
        }


        if($request -> btn == 'editar'){
            $idPuesto = $request -> idPuesto;
            $nombrePuesto = $request -> nombrePuesto;
            $sql = $this->FuncionesTSQL->crudPuesto($idPuesto,$nombrePuesto,$btn);
            return view('mensaje')->with('mensaje', $sql);     
        }

        if($request -> btn == 'consultar'){
            $idPuesto = $request -> idPuesto;
            $nombrePuesto = $request -> nombrePuesto;
            $sql = $this->FuncionesTSQL->crudPuesto($idPuesto,'',$btn);
            return view('mensaje')->with('mensaje', $sql);

        }

        if($request -> btn == 'borrar'){
            $idPuesto = $request -> idPuesto;
            $nombrePuesto = $request -> nombrePuesto;
            $sql = $this->FuncionesTSQL->crudPuesto($idPuesto,'',$btn);
            return view('mensaje')->with('mensaje', $sql);
        }

    }
}
