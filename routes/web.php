<?php

use Illuminate\Support\Facades\Route;
use App\catalogo\Laboratorio;
use App\catalogo\Materia;
use App\catalogo\Hora;
use App\catalogo\Ciclo;
use App\Role;
use App\catalogo\Horario;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\catalogo\Practica;
use App\catalogo\Software;
use App\catalogo\LaboratorioSoftware;

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

        $laboratorio = Laboratorio::findOrFail(14);
        $laboratorio->softwares()->attach(5);

        $resp = "";
        foreach ($laboratorio->softwares as $obj ) 
        {   
			echo $obj->nombre." / 	";        
        }
	 
        return $laboratorio->softwares;
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
Route::resource('catalogo/horario', 'catalogo\HorarioControler');
Route::post('catalogo/rol/add_permiso', 'catalogo\RolePermissionController@add_permiso');
Route::post('catalogo/roles/delete_permiso', 'catalogo\RolePermissionController@delete_permiso');
Route::resource('catalogo/horario', 'catalogo\HorarioControler');
Route::resource('catalogo/horas', 'catalogo\HoraControler');
//para combos
Route::get('catalogo/horarios/{id}/{dia}', 'catalogo\HorarioControler@getHorarios');
Route::get('catalogo/expoexcel', 'catalogo\HorarioControler@exportarExcel');
Route::post('catalogo/impoexcel', 'catalogo\HorarioControler@importarExcel');
Route::post('catalogo/infoLab', 'catalogo\HorarioControler@actualizarInfoLab');
Route::post('catalogo/{id}/{dia}/infoLab', 'catalogo\HorarioControler@actualizarInfoLab');
Route::get('catalogo/agregarSoftware', 'catalogo\HorarioControler@agregarSoftware');
Route::get('catalogo/quitarSoftware', 'catalogo\HorarioControler@quitarSoftware');

