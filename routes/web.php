<?php

use Illuminate\Support\Facades\Route;
use App\Laboratorio;
use App\User;
use App\catalogo\Carrera;

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
	  return Laboratorio::all();
	  
});

Route::resource('software','SoftwareController');


//catalogos
Route::resource('catalogo/facultad', 'catalogo\FacultadController');
Route::resource('catalogo/carrera', 'catalogo\CarreraController');
Route::resource('catalogo/materia', 'catalogo\MateriaController');
Route::resource('catalogo/software', 'catalogo\SoftwareController');
Route::resource('catalogo/practica', 'catalogo\PracticaController');
Route::resource('catalogo/roles', 'catalogo\RolesController');
Route::resource('catalogo/laboratorio', 'catalogo\LaboratorioController');
Route::get('/single/{id}', 'HomeController@single')->name('single');
Route::post('catalogo/carrera/add_materia', 'catalogo\CarreraController@add_materia');
Route::post('catalogo/rol/add_permiso', 'catalogo\RolePermissionController@add_permiso');
Route::post('catalogo/roles/delete_permiso', 'catalogo\RolePermissionController@delete_permiso');


Route::resource('catalogo/horario', 'catalogo\HorarioControler');

//para combos
Route::get('catalogo/horas_clases/combo/{id}', 'catalogo\HorasClasesController@getHorasClases');