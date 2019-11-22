<?php

namespace App\Http\Controllers;

use App\Reporte;

use Illuminate\Support\Facades\Crypt;

use App\TSQL\FuncionesTSQL;
use Illuminate\Http\Request;
//
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade as PDF;

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
            $error = $sql = $this->FuncionesTSQL->crudTipoActividad($idTipoActividad,$nombreActividad,$request -> btn);
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
             return view('mensaje')->with('mensaje', $sql);
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
            if(empty($_FILES['archivo']['tmp_name'])){
                $archivoEvidencia = null;
                $nombreArchivo = null;
                $tipoArchivo = null;
            }else{
                $permitidos = array("image/jpg","image/jpeg","image/png","application/pdf","application/docx","application/docs");
                if(in_array($_FILES['archivo']['type'], $permitidos)){
                    $nombreArchivo = $_FILES["archivo"]["name"];
                    $tipoArchivo = $_FILES["archivo"]["type"];
                    $archivoEvidencia = file_get_contents($_FILES['archivo']['tmp_name']);
                    
                    $sql = $this->FuncionesTSQL->crudEvidencia($nombreEvidencia,$tipoArchivo,$nombreArchivo,null,$idAvance,'nuevo');
                    
                    $consulta = array_values($sql)[0];

                    $rutaCarpeta = "archivos/evidenciasReporte/$consulta->id/"; // Rura en la carpeta public donde estaran los archivos
                    if(!file_exists($rutaCarpeta))
                    {
                        mkdir($rutaCarpeta);
                    }
                    if(!file_exists($nombreArchivo)){
                        move_uploaded_file($_FILES['archivo']['tmp_name'],"$rutaCarpeta".$nombreArchivo);
                        
                        // imprime resultado de la BD $consulta
                        return redirect()->back() ->with('alert', $consulta->mensaje);
                    }else{
                        $mensaje = 'El archivo ya existe, o tiene el mismo nombre';
                    return redirect()->back() ->with('alert', $mensaje);
                    }

                }else{
                    $mensaje = 'archivo no permitido';
                    return redirect()->back() ->with('alert', $mensaje);
                }
            }

            //return $this->NuevoReporte();

        }

    }//llave function Accion

    
    public function ListarReportes(){

        $listarReportes = $this->FuncionesTSQL->getListarReportes();
        // $listaReporteTipoActividadEvidenciaAvanceGestor = $this->FuncionesTSQL->getListarReporteTipoActividadEvidenciaAvanceGestor();
        return view('srgalListar/Reportes')->with('listarReportes',$listarReportes);
    }


    public function VerReporte($idReporte){
        /*
        $dompdf = new Dompdf();
        $dompdf->set_option('isHtml5ParserEnabled', true);
        $dompdf->loadHtml(view('pdfVistas/reporteGeneral'));
        $dompdf->render();
        return $dompdf->stream('reporte-completo.pdf');
        */

        $id = Crypt::decrypt($idReporte);
        $obtenerReportesActObj = $this->FuncionesTSQL->ObtenerReporteActividadObjetivo($id);
        $obtenerReporteTipActEveAvaGes = $this->FuncionesTSQL->ObtenerReporteTipoActividadEvidenciaAvance($id);
        return view('pdfVistas/reporteGeneral')->with('obtenerRepActObj', $obtenerReportesActObj)->with('obtenerTipActEveAvaGes', $obtenerReporteTipActEveAvaGes)->with('id', $id);

        
    }


    public function pdfExportarReporte($id){
    
        $id = Crypt::decrypt($id);
        $obtenerReportesActObj = $this->FuncionesTSQL->ObtenerReporteActividadObjetivo($id);
        $obtenerReporteTipActEveAvaGes = $this->FuncionesTSQL->ObtenerReporteTipoActividadEvidenciaAvance($id);

        // $dompdf = new Dompdf();
        // $dompdf->set_paper('letter', 'portrait');
        // $dompdf->set_option('isHtml5ParserEnabled', true);
        // $dompdf->loadHtml(view('pdfVistas/reporteGeneral')->with('obtenerRepActObj', $obtenerReportesActObj)->with('obtenerTipActEveAvaGes', $obtenerReporteTipActEveAvaGes)->with('id', $id));
        // $dompdf->render();
        // return $dompdf->stream('reporte-completo.pdf');


        $pdf = PDF::loadHTML(view('pdfVistas/reporteGeneral')->with('obtenerRepActObj', $obtenerReportesActObj)->with('obtenerTipActEveAvaGes', $obtenerReporteTipActEveAvaGes)->with('id', $id))->setPaper('a4', 'landscape');

        return $pdf->download();
    }

}