<?php

use Illuminate\Support\Facades\Route;
use App\Laboratorio;
use App\Role;
use App\catalogo\Horario;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
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
	return Carbon::now();
	  // $horario = Horario::findOrFail(1);
	  // return $horario->laboratorio;
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
Route::resource('catalogo/laboratorio', 'catalogo\LaboratorioController');
Route::get('/single/{id}', 'HomeController@single')->name('single');
Route::get('/confirmation', 'catalogo\UserController@firstLogin')->name('confirmation');
Route::put('/end-register/{id}', 'catalogo\UserController@setPass')->name('end-register');
Route::post('catalogo/carrera/add_materia', 'catalogo\CarreraController@add_materia');
Route::resource('catalogo/horario', 'catalogo\HorarioControler');