<?php

use Illuminate\Support\Facades\Route;
use App\catalogo\Laboratorio;
use App\User;
use App\catalogo\Practica;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\catalogo\Horario;

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

<<<<<<< HEAD

Route::get('/test', function () {

=======
Route::DELETE('/test/{id}', function ($id) {

        $laboratorio = LaboratorioSoftware::findOrFail($id);
        $laboratorio->delete();
        echo "hola perros";
        //return $laboratorio;
//Route::get('/test', function () {
	//return Horario::all();
		// $user = Laboratorio::findOrFail(1);
		// $user->users()->sync(1);
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
	  	
>>>>>>> origin
});

Route::resource('software','SoftwareController');


//catalogos
Route::resource('catalogo/permission', 'catalogo\PermissionController');
Route::resource('catalogo/user', 'catalogo\UserController');
Route::get('users', 'catalogo\UserController@listarUsuarios')->name('users');
Route::resource('catalogo/ciclo', 'catalogo\CicloController');
Route::resource('catalogo/facultad', 'catalogo\FacultadController');
Route::resource('catalogo/carrera', 'catalogo\CarreraController');
Route::resource('catalogo/materia', 'catalogo\MateriaController');
Route::resource('catalogo/software', 'catalogo\SoftwareController');
Route::resource('catalogo/practica', 'catalogo\PracticaController');
Route::get('/practicas/{id}', 'catalogo\PracticaController@listarpracticas')->name('practicas');
Route::get('/practica/{id}', 'catalogo\PracticaController@crearPractica')->name('practica');
Route::resource('catalogo/roles', 'catalogo\RolesController');
Route::resource('catalogo/laboratorio', 'catalogo\LaboratorioController');
Route::get('/mylabs', 'catalogo\LaboratorioController@listMyLabs')->name('mylabs');
Route::get('/encargados/{id}', 'catalogo\LaboratorioController@listarEncargados')->name('encargados');
Route::post('/encargado/{id}', 'catalogo\LaboratorioController@setEncargado')->name('encargado');
Route::get('/single/{id}', 'HomeController@single')->name('single');
Route::get('/confirmation', 'catalogo\UserController@firstLogin')->name('confirmation');
Route::put('/end-register/{id}', 'catalogo\UserController@setPass')->name('end-register');
Route::post('catalogo/carrera/add_materia', 'catalogo\CarreraController@add_materia');
Route::resource('catalogo/horario', 'catalogo\HorarioControler');
Route::post('catalogo/rol/add_permiso', 'catalogo\RolePermissionController@add_permiso');
Route::post('catalogo/roles/delete_permiso', 'catalogo\RolePermissionController@delete_permiso');
Route::resource('catalogo/horas', 'catalogo\HoraControler');
//para combos
Route::get('catalogo/horarios/{id}/{dia}', 'catalogo\HorarioControler@getHorarios');
Route::get('catalogo/expoexcel', 'catalogo\HorarioControler@exportarExcel');
Route::post('catalogo/impoexcel', 'catalogo\HorarioControler@importarExcel');
Route::post('catalogo/infoLab', 'catalogo\HorarioControler@actualizarInfoLab');
Route::post('catalogo/{id}/{dia}/infoLab', 'catalogo\HorarioControler@actualizarInfoLab');
Route::get('catalogo/agregarSoftware', 'catalogo\HorarioControler@agregarSoftware');
//Route::post('catalogo/quitarSoftware', 'catalogo\HorarioControler@quitarSoftware');
Route::delete('quitarSoftware/{id_s}/{id_l}', 'catalogo\HorarioControler@quitarSoftware');
Route::put('catalogo/setciclo/{id}', 'catalogo\CicloController@setCiclo');
Route::get('catalogo/ciclos', 'catalogo\CicloController@getCiclos')->name('ciclos');

