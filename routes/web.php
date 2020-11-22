<?php

use Illuminate\Support\Facades\Route;
use App\catalogo\Hora;
use App\catalogo\Laboratorio;
use App\Role;
use App\catalogo\Horario;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\catalogo\Practica;

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

Route::get('/','HomeController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function () {

	$laboratorios = Laboratorio::with('horarios')->whereHas('horarios', function ($query) {
		$query->where('dia', 'Lunes')->get();
	});
	return $laboratorios;
	//return Laboratorio::with('horarios')->get();
    // foreach(auth()->user()->laboratorio as $lab) {
    // 	$id = $lab->id;
    // }
    // $horarios = Horario::with('practicas')->where('laboratorio_id',"=", $id)->get();
    
    // return auth()->user()->laboratorio;
   	// return view('catalogo.laboratorio.mylab');
	//  $practica = Horario::with('practicas')->get();
	//  $horario = $practica;
	//   return $horario;	 
	// $practicas = Practica::with('horario')->get();
	//  foreach ($practicas as $key => $practica) {
	//  	return $practica->horario->hora->horario;
	//  }
	  	
});

Route::resource('software','SoftwareController');


//catalogos
Route::resource('catalogo/permission', 'catalogo\PermissionController');
Route::resource('catalogo/user', 'catalogo\UserController');
Route::resource('catalogo/ciclo', 'catalogo\CicloController');
Route::resource('catalogo/facultad', 'catalogo\FacultadController');
Route::resource('catalogo/carrera', 'catalogo\CarreraController');
Route::resource('catalogo/materia', 'catalogo\MateriaController');
Route::resource('catalogo/software', 'catalogo\SoftwareController');
Route::resource('catalogo/practica', 'catalogo\PracticaController');
Route::resource('catalogo/roles', 'catalogo\RolesController');
Route::resource('catalogo/laboratorio', 'catalogo\LaboratorioController');
Route::get('/single/{id}', 'HomeController@single')->name('single');
Route::get('/confirmation', 'catalogo\UserController@firstLogin')->name('confirmation');
Route::put('/end-register/{id}', 'catalogo\UserController@setPass')->name('end-register');
Route::post('catalogo/carrera/add_materia', 'catalogo\CarreraController@add_materia');
Route::resource('catalogo/horario', 'catalogo\HorarioController');
Route::post('catalogo/rol/add_permiso', 'catalogo\RolePermissionController@add_permiso');
Route::post('catalogo/roles/delete_permiso', 'catalogo\RolePermissionController@delete_permiso');
//Route::resource('catalogo/horario', 'catalogo\HorarioControler');
Route::resource('catalogo/horas', 'catalogo\HoraController');
//para combos
Route::get('catalogo/horarios/{id}/{dia}', 'catalogo\HorarioController@getHorarios');
Route::resource('views/home', 'catalogo\HomeClasesController');
Route::resource('reporte/reporte', 'reporte\HorarioController');
Route::post('reporte/reporte_aceptar', 'reporte\HorarioController@reporte_aceptar');

Route::get('catalogo/filtro/{id}', 'catalogo\FiltroController@getData');
Route::get('catalogo/filtros/{tipo}/{par1}/{par2}', 'catalogo\FiltroController@filtrado');


