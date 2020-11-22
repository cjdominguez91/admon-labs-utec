<?php

namespace App\Http\Controllers\catalogo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\catalogo\Laboratorio;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\catalogo\LaboratorioFormRequest;
use DB;
use Carbon\Carbon;
use App\User;

class LaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request) {
            if (auth()->user()->can('read laboratorios')) {
            $laboratorios = Laboratorio::get();
            return view('catalogo.laboratorio.index', ["laboratorios" => $laboratorios]);
           // dd($materias);
           
            } else {
               return abort('403');
           }
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->can('create laboratorios')) {
        $usuarios = User::get();
        return view("catalogo.laboratorio.create", ["usuarios" => $usuarios]);
        } else {
            // abort(403);
            return view('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $laboratorio = new Laboratorio;
        $laboratorio->nombre = $request->get('nombre');
        $laboratorio->ubicacion = $request->get('ubicacion');
        $laboratorio->user_id = $request->get('encargado');
        $laboratorio->imagen = "lab0.png";
        $laboratorio->timestamp = Carbon::now(); 
        $laboratorio->save();
        alert()->success('El registro ha sido agregado correctamente');
        return Redirect::to('catalogo/laboratorio/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("catalogo.laboratorio.show", ["laboratorio" => laboratorio::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $usuarios = User::all();
        $laboratorio = Laboratorio::findOrFail($id);
        return view("catalogo.laboratorio.edit", ["laboratorio" => $laboratorio, "usuarios" => $usuarios]);

        // return view("catalogo.carrera.edit", ["carrera" => Carrera::findOrFail($id), "facultades" => $facultades, 'materias' => $materias, 'materias_carrera' => $materias_carrera]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $laboratorio = Laboratorio::findOrFail($id);
        $laboratorio->nombre = $request->get('nombre');
        $laboratorio->ubicacion = $request->get('ubicacion');
        $laboratorio->update();
        alert()->info('El registro ha sido modificado correctamente');
        return redirect('catalogo/laboratorio/' . $id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laboratorio = Laboratorio::findOrFail($id);
        $laboratorio->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return Redirect::to('catalogo/laboratorio');
    }

    public function listarEncargados($id)
    {
        $users = User::all();
        $laboratorio = Laboratorio::findOrFail($id);
        return view('catalogo.laboratorio.encargados', ["laboratorio" => $laboratorio, 'users' => $users]);
    }

    public function setEncargado(Request $request, $id)
    {
        $user = $request->user;
        $laboratorio = Laboratorio::findOrFail($id);
        $laboratorio->users()->sync($user);
         $users = User::all();
        return Redirect::to('encargados/'.$laboratorio->id);
        // return view('catalogo.laboratorio.encargados', ["laboratorio" => $laboratorio, 'users' => $users]);
    }

    public function listMyLabs()
    {

        if (auth()->user()->can('read laboratorios')) {
            $laboratorios = Laboratorio::get();
            return view('catalogo.laboratorio.mylab', ["laboratorios" => $laboratorios]);
        }
        $users = User::findOrFail(auth()->user()->id);
        $laboratorios = $users->laboratorios;
        return view('catalogo.laboratorio.mylab', ["laboratorios" => $laboratorios]);
    }
}
