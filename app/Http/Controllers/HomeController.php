<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\catalogo\Laboratorio;
use Illuminate\Support\Facades\Auth;

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
            $laboratorio = Laboratorio::findOrFail($id);
            return view('catalogo.laboratorio.single', ["laboratorio" => $laboratorio]);
    }
    
}
