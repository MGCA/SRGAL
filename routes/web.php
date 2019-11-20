<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//MODULO DepartamentoHojasSeguridad

Route::get('/ModuloSeguridad', 'DepartamentoHojasSeguridadController@index');
Route::post('/ModuloSeguridad', 'DepartamentoHojasSeguridadController@AccionDepartamentHojasSeguridad');


//Modulo Gestores Autorizados
Route::get('/GestoresAutorizados', 'GestoresAutorizadosController@index');
Route::post('/GestoresAutorizados', 'GestoresAutorizadosController@AccionGestoresAutorizados');



//Modulo Documentos Generales
Route::get('/DocumentosGenerales', 'DocumentosGeneralesController@index');
Route::post('/DocumentosGenerales', 'DocumentosGeneralesController@AccionDocumentosGenerales');
//listar
Route::get('/ListarDocumentosGenerales', 'DocumentosGeneralesController@ListarDocumentosGenerales');
//descargar
// Route::get('/DescargarDocumentoGeneral','DocumentosGeneralesController@DescargarDocumentoGeneral');
// Route::post('/DescargarDocumentoGeneral','DocumentosGeneralesController@DescargarDocumentoGeneral');



/*Route::get('/GestionPgai',function(){
    return view('GestionPgai');
});*/


//INICIO D
//Ruta GestionPgai con controller, la primera parte da el nombre de URL y el
//segundo llama al metodo de ReporteController (function index()) quien devuelve la ruta exacta
Route::get('/GestionPgai','ReporteController@index');//Vista Gestion Pgai
//FIN
Route::get('/GestionFuncionarios','FuncionarioController@index');//Vista Gestion Funcionarios
Route::get('/NuevoReporte','ReporteController@NuevoReporte');//Vista Nuevo Reporte
Route::get('/Agregar','PuestoController@getIndex');//Trae el select List de Puestos
Route::get('/VerReporteCompleto','ReporteController@pdfExportarReporte');




//Agregar Nuevo Funcionario
Route::post('/NuevoFuncionario','FuncionarioController@create');//Manda a guardar FuncionarioController@create
Route::get('/NuevoFuncionario','FuncionarioController@Vista');//trae una vista
//varas//

//Listar Funcionarios
Route::get('/ListarFuncionarios','FuncionarioController@ListarFuncionarios');

//Lisar Puestos
Route::get('/ListarPuestos', 'PuestoController@ListarPuestos');

//Accion Funcionarios CRUD
Route::get('EditarFuncionario', 'FuncionarioController@AccionFuncionarios');//S-P CRUD Manda a la vista informacion
Route::post('EditarFuncionario', 'FuncionarioController@AccionFuncionarios');//S-P CRUD Obtiene informacion de la vista
//Accion Funcionarios CRUD

//Accion Puestos CRUD
Route::get('EditarPuesto', 'PuestoController@AccionPuesto');//S-P CRUD Manda a la vista informacion
Route::post('EditarPuesto', 'PuestoController@AccionPuesto');//S-P CRUD Obtiene informacion de la vista
//Accion Puestos CRUD

//Accion TipoActividad CRUD
Route::get('EditarReporte', 'ReporteController@AccionReporte');//S-P CRUD Manda a la vista informacion
Route::post('EditarReporte', 'ReporteController@AccionReporte');//S-P CRUD Obtiene informacion de la vista
//Accion TipoActividad CRUD

Route::get('/mensaje', function () {
    return view('mensaje');
});

Route::get('/NuevoPuesto', function () {
    return view('srgalAgregar/NuevoPuesto');
});
//Generar REPORTE PDF

//Generar REPORTE PDF



//Route::post('/create','FuncionarioController@vista');
//Route::post('/create','FuncionarioController@create');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
