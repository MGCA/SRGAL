<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\Puesto;
use App\TSQL\FuncionesTSQL;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    protected $FuncionesTSQL;

    public function __construct(FuncionesTSQL $FuncionesTSQL)
    {
        $this->FuncionesTSQL = $FuncionesTSQL;
        //
        $this->middleware('auth');
    }


    public function index(){
        return view('GestionFuncionarios');
    }

    public function Vista(){
        $puesto = Puesto::all();
        return view('srgalAgregar/NuevoFuncionario')->with('puesto', $puesto);
    }

    // public function create(Request $request){

    //         $id = $request -> cedula;
    //         $nombre = $request -> nombre;
    //         $priApellido = $request -> priApellido;
    //         $segApellido = $request -> segApellido;
    //         $correo = $request -> correo;
    //         $telefono = $request -> telefono;
    //         $idPuesto = $request -> idPuesto;
    //         $sql = $this->FuncionesTSQL->getFuncionario($id,$nombre,$priApellido,$segApellido,$correo,$telefono,$idPuesto,$request -> btn);
    //     return view('mensaje')->with('mensaje', $sql);
    // }

    public function ListarFuncionarios(){
        $funcionario = $this->FuncionesTSQL->getListarFuncionario();
        return view('srgalListar/ListarFuncionarios')->with('funcionario', $funcionario);
    }

    public function AccionFuncionarios(Request $request){
        $btn = $request -> btn;

        $funcionario = new Funcionario();
        $funcionario -> cedula = $request -> cedula;
        $puesto = Puesto::all();

        if($request -> btn == 'nuevo'){                   
            $id = $request -> cedula;
            $nombre = $request -> nombre;
            $priApellido = $request -> priApellido;
            $segApellido = $request -> segApellido;
            $correo = $request -> correo;
            $telefono = $request -> telefono;
            $idPuesto = $request -> idPuesto;
            $sql = $this->FuncionesTSQL->crudFuncionario($id,$nombre,$priApellido,$segApellido,$correo,$telefono,$idPuesto,$request -> btn);
        return view('mensaje')->with('mensaje', $sql);
        }

        if($request -> btn == 'insertar'){                   
            return view('srgalAgregar/NuevoFuncionario')->with('puesto', $puesto);
        }


        if($request -> btn == 'editar'){
            $id = $request -> cedula;
            $nombre = $request -> nombre;
            $priApellido = $request -> priApellido;
            $segApellido = $request -> segApellido;
            $correo = $request -> correo;
            $telefono = $request -> telefono;
            $idPuesto = $request -> idPuesto;
            $sql = $this->FuncionesTSQL->crudFuncionario($id,$nombre,$priApellido,$segApellido,$correo,$telefono,$idPuesto,$request -> btn);
            if(isset($sql)){
                return view('srgalEditar/EditarFuncionario')->with('idFuncionario', $sql);
            }
                 
            
        }

        if($request -> btn == 'consultar'){
            $id = $request -> idFuncionario;

            $funcionario = $this->FuncionesTSQL->crudFuncionario($id,'','','','','',0,$btn);
            foreach($funcionario as $f){
                if(isset($f->mensaje)){
                    return view('srgalEditar/EditarFuncionario')->with('idFuncionario',$funcionario)->with('puesto',$puesto);
                } 
                else{
                    return view('srgalEditar/EditarFuncionario')->with('idFuncionario', $funcionario)->with('puesto',$puesto);
                }
            } 
        }

        if($request -> btn == 'borrar'){
            $id = $request -> idFuncionario;
            $sql = $this->FuncionesTSQL->crudFuncionario($id,'','','','','',0,$btn);
            return view('mensaje')->with('mensaje', $sql);
        }

    }


}
