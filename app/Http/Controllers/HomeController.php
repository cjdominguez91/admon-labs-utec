<?php

use App\catalogo\Practica;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\catalogo\Laboratorio;
use Illuminate\Support\Facades\Auth;
use App\catalogo\Horario;
use App\catalogo\Materia;
use App\catalogo\Hora;
use App\catalogo\Ciclo;


use Illuminate\Support\Facades\Route;
use App\Role;
use Carbon\Carbon;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function __construct()
    {
            $this->middleware('firstlogin');
    }

    public function index(Request $request)
    {
        if ($request) {
            $this->middleware('firstlogin');
            $laboratorios = Laboratorio::with('user')->get();

            return view('home', ["laboratorios" => $laboratorios]);
        }
    }





    public function single($id)
    {  
        $horarios = Horario::with('laboratorio', 'materia', 'hora', 'ciclo')->where([['laboratorio_id', '=', $id]])->get(); 

        $laboratorio = Laboratorio::where([['id', '=', $id]])->get();
        foreach($laboratorio as $obj) 
        {
          $nom_lab = $obj->nombre;
          $ubica_lab = $obj->ubicacion;
          $cant_lab = $obj->cant_equipo;
          $imagen_lab = $obj->imagen;
          //$soft_lab = $obj->software;
          $user = $obj->user_id;
        }

        $usuario = User::where([['id', '=', $user]])->get('nombres');
        foreach($usuario as $obj) 
        {
            $nombre_encargado = $obj->nombres.", ".$obj->apellidos;
        }
        
        $soft_lab = Laboratorio::findOrFail($id);
        //echo $usuario."<br>";
        //echo $usuario->nombres."<br>";

            /*echo $id."<br><br>";
            echo $horarios."<br><br>";
            echo $laboratorios."<br><br><br><br>";
          echo $nom_lab."<br>";
          echo $ubica_lab."<br>";
          echo $cant_lab."<br>";
          echo $imagen_lab."<br>";
          echo $soft_lab."<br>";*/

        return view('catalogo.laboratorio.single', ["horarios"=>$horarios, "nom_lab"=>$nom_lab, "ubica_lab"=>$ubica_lab, "cant_lab"=>$cant_lab, "imagen_lab"=>$imagen_lab, "soft_lab"=>$soft_lab, "nombre_encargado"=>$nombre_encargado ]);       

    }
    
}
