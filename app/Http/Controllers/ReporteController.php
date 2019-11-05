<?php

namespace App\Http\Controllers;

use App\Reporte;
use App\TSQL\FuncionesTSQL;
use Illuminate\Http\Request;
//
use Dompdf\Dompdf;

class ReporteController extends Controller
{
    //
    protected $FuncionesTSQL;
    public function __construct(FuncionesTSQL $FuncionesTSQL){
        $this->FuncionesTSQL = $FuncionesTSQL;
        //
        $this->middleware('auth');
    }

    public function index(){

        return view('GestionPgai');
    }
    
    public function NuevoReporte(){
        $actividadAmbiental = $this->FuncionesTSQL->getListarActividadAmbiental();
        $reporte = $this->FuncionesTSQL->getListarReportes();
        $tipoActividad = $this->FuncionesTSQL->getListarTipoActividad();
        $avance = $this->FuncionesTSQL->getListarAvance();
        return view('srgalAgregar/NuevoReporte')->with('tipoActividad',$tipoActividad)->with('reporte', $reporte)->with('actividadAmbiental',$actividadAmbiental)->with('avance', $avance);
    }

    public function AccionReporte(Request $request){

        if($request -> btn == 'nuevo'){                   
           $idTipoActividad = null;
           $nombreActividad = $request -> nombreActividad;
            $sql = $this->FuncionesTSQL->crudTipoActividad($idTipoActividad,$nombreActividad,$request -> btn);
        return $this -> NuevoReporte();
        }

        if($request -> btn == 'consultar'){                   
            $idTipoActividad = $request -> idTipoActividad;
            $nombreActividad = "";
             $sql = $this->FuncionesTSQL->crudTipoActividad($idTipoActividad,$nombreActividad,$request -> btn);
             return view('mensaje')->with('mensaje', $sql);
        }

        if($request -> btn == 'guardarReporte'){
            $aspectoAmbiental = $request -> aspectoAmbiental;
            $prioridad = $request -> prioridad;
            $presupuesto = $request -> presupuesto;
            $fechaInicial = $request -> fechaInicial;
            $fechaFinal = $request -> fechaFinal;
            $metaAmbiental = $request -> metaAmbiental;
            $estado = $request -> estado;
            $sql = $this->FuncionesTSQL->crudReporte($aspectoAmbiental, $prioridad, $presupuesto, $fechaInicial, $fechaFinal, $metaAmbiental, $estado, null, 'nuevo');
             //return view('mensaje')->with('mensaje', $sql);
             //Trabajando para volver
            return $this->NuevoReporte();
        }

        if($request -> btn == 'guardarActividadAmbiental'){
            $descripcionActividadAmbiental = $request -> descripcionActividadAmbiental;
            $indicador = $request -> indicador;
            $recurso = $request -> recurso;
            $idReporte = $request -> idReporte;
            $sql = $this->FuncionesTSQL->crudActividadAmbiental($descripcionActividadAmbiental,$indicador,$recurso,null,$idReporte,'nuevo');
                //
            //return view('mensaje')->with('mensaje', $sql);
            return $this->NuevoReporte();
        }

        if($request -> btn == 'guardarTipoActividad'){
            $nombreActividad = $request -> nombreActividad;
            $idActividadAmbiental = $request -> idActividadAmbiental;
            $sql = $this->FuncionesTSQL->crudTipoActividad($nombreActividad,null,$idActividadAmbiental,'nuevo');
                //
            //return view('mensaje')->with('mensaje', $sql);
            return $this->NuevoReporte();
        }

        if($request -> btn == 'guardarObjetivos'){
            $descripcionObjetivo = $request -> descripcionObjetivo;
            $idActividadAmbiental = $request -> idActividadAmbiental;
            $sql = $this->FuncionesTSQL->crudObjetivo($descripcionObjetivo,null,$idActividadAmbiental,'nuevo');
                //
            //return view('mensaje')->with('mensaje', $sql);
            return $this->NuevoReporte();
        }

        if($request -> btn == 'guardarAvance'){
            $descripcionAvance = $request -> descripcionAvance;
            $idTipoActividad = $request -> idTipoActividad;
            $sql = $this->FuncionesTSQL->crudAvance($descripcionAvance,null,$idTipoActividad,'nuevo');
                //
            //return view('mensaje')->with('mensaje', $sql);
            return $this->NuevoReporte();
        }

        if($request -> btn == 'guardarEvidencia'){
            $idAvance = $request -> idAvance;
            $nombreEvidencia = $request -> nombreEvidencia;
            $nombreArchivo = $_FILES["archivo"]["name"];
            $archivo = file_get_contents($_FILES["archivo"]["tmp_name"]);
            $sql = $this->FuncionesTSQL->crudEvidencia($nombreEvidencia,$archivo,$nombreArchivo,null,$idAvance,'nuevo');
                //
            //return view('mensaje')->with('mensaje', $sql);
            return $this->NuevoReporte();
        }

    }

    public function pdfExportarReporte(){
        /*
        $dompdf = new Dompdf();
        $dompdf->set_option('isHtml5ParserEnabled', true);
        $dompdf->loadHtml(view('pdfVistas/reporteGeneral'));
        $dompdf->render();
        return $dompdf->stream('reporte-completo.pdf');
        */
        return view('pdfVistas/reporteGeneral');
    }
}