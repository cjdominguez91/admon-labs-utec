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
            $laboratorios = Laboratorio::with('users')->get();
            return view('home', ["laboratorios" => $laboratorios]);
        }
    }





    public function single($id)
    {  
        $laboratorio = Laboratorio::findOrfail($id);

        $horarios = Horario::with('laboratorio', 'materia', 'hora', 'ciclo')->where([ ['laboratorio_id', '=', $id], ['ciclo_id', '=', ciclo()->id]])->get();         
        


        return view('catalogo.laboratorio.single', ["horarios" => $horarios, 'laboratorio' => $laboratorio ]);       

    }

    public function horariosPractica(Request $request)
    {
        return Horario::with('hora', 'laboratorio','ciclo','materia')
                 ->where([['materia_id',6],['ciclo_id', ciclo()->id]])
                 ->get();
    }
    
}
