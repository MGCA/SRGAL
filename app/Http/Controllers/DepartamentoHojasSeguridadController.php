<?php

namespace App\Http\Controllers;

use App\TSQL\FuncionesTSQL;
use Illuminate\Http\Request;
//
use Dompdf\Dompdf;

class DepartamentoHojasSeguridadController extends Controller
{
    //
    protected $FuncionesTSQL;
    public function __construct(FuncionesTSQL $FuncionesTSQL){
        $this->FuncionesTSQL = $FuncionesTSQL;
        //
        $this->middleware('auth');
    }

    public function index(){
        $listaProductos = $this->FuncionesTSQL->getListarProductos();
        $listaAreaCentroFormacion = $this->FuncionesTSQL->getListarAreaCentroFormacion();
        return view('srgalAgregar/DepartamentoHojasSeguridad')->with('listaProductos', $listaProductos)->with('listaAreaCentroFormacion', $listaAreaCentroFormacion);
    }

    public function AccionDepartamentHojasSeguridad(Request $request){
        
        if($request->btn == 'guardarHojasSeguridad'){

            $nombreProducto = $request -> nombreProducto;
            $marca = $request -> marca;
            $codigo = $request -> codigo;
            $requiereHojaSeguridad = $request -> requiereHojaSeguridad;
            if(empty($_FILES['archivoHojaSeguridad']['tmp_name'])){
                $archivoHojaSeguridad = null;
            }else{
            $archivoHojaSeguridad = file_get_contents($_FILES['archivoHojaSeguridad']['tmp_name']);  
            }
            
            $sql = $this->FuncionesTSQL->crudProducto($nombreProducto,$marca,$codigo,$requiereHojaSeguridad,$archivoHojaSeguridad,null,'nuevo');
            foreach($sql as $g)
            if(isset($g->mensaje)){
                return redirect()->back() ->with('alert', $g->mensaje);
            }
        }

        if($request->btn == 'guardarAreasCentroFormacion'){
            $nombreArea = $request -> nombreArea;
            $ubicacion = $request -> ubicacion;
            
            $sql = $this->FuncionesTSQL->crudAreaCentroFormacion($nombreArea,$ubicacion,null,'nuevo');

            foreach($sql as $g)
            if(isset($g->mensaje)){
                return redirect()->back() ->with('alert', $g->mensaje);
            }
        }

        if($request->btn == "guardarHojasAreas"){
            $idProducto = $request -> idProducto;
            $idAreasCentroFormacion = $request -> idAreasCentroFormacion;

            $sql = $this->FuncionesTSQL->crudProductoAreaCentroFormacion($idProducto,$idAreasCentroFormacion,null,'nuevo');

            foreach($sql as $g)
            if(isset($g->mensaje)){
                return redirect()->back() ->with('alert', $g->mensaje);
            }


        }
        

    }
}