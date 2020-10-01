<?php

namespace App\Http\Controllers\catalogo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\catalogo\Carrera;
use App\catalogo\Facultad;
use App\catalogo\Materia;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\catalogo\CarreraFormRequest;
use App\Role;
use App\User;
use DB;
use Carbon\Carbon;

class CarreraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {

        if ($request) {

            if (auth()->user()->can('read carreras')) {
            $carreras = Carrera::with('facultades')->get();
            // dd($carreras);
            return view('catalogo.carrera.index', ["carreras" => $carreras]);
        } else {
            // abort(403);
            return view('home');
        }
    }
}
    public function create()
    {
        if (auth()->user()->can('create carreras')) {
        $facultades = Facultad::get();
        return view("catalogo.carrera.create", ["facultades" => $facultades]);
    } else {
        // abort(403);
        return view('home');
    }
}
    public function store(CarreraFormRequest $request)
    {
        $carrera = new Carrera;
        $carrera->nombre = $request->get('nombre');
        $carrera->facultad = $request->get('facultad');
        $carrera->timestamp = Carbon::now(); 
        $carrera->save();
        alert()->success('El registro ha sido agregado correctamente');
        return Redirect::to('catalogo/carrera/create');
    }
    public function show($id)
    {
        return view("catalogo.carrera.show", ["carrera" => Carrera::findOrFail($id)]);
    }
    public function edit($id)
    {
        $facultades = Facultad::get();
        $carrera = Carrera::findOrFail($id);
        $materias_carrera = $carrera->carreraMaterias;
        $materias = Materia::get();

        return view("catalogo.carrera.edit", ["carrera" => Carrera::findOrFail($id), "facultades" => $facultades, 'materias' => $materias, 'materias_carrera' => $materias_carrera]);
    }
    public function update(CarreraFormRequest $request, $id)
    {
        $carrera = Carrera::findOrFail($id);
        $carrera->nombre = $request->get('nombre');
        $carrera->facultad = $request->get('facultad');
        $carrera->update();
        alert()->info('El registro ha sido modificado correctamente');
        return redirect('catalogo/carrera/' . $id . '/edit');
    }
    public function destroy($id)
    {
        $carrera = Carrera::findOrFail($id);
        $carrera->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return Redirect::to('catalogo/carrera');
    }

    public function add_materia(Request $request)
    {
        $carrera = Carrera::findOrFail($request->get('id'));
        $materia = Materia::findOrFail($request->get('materias'));

        $carrera->carreraMaterias()->attach($request->get('materias'));
        $carrera->save();

        return redirect('catalogo/carrera/' . $carrera->id . '/edit');
    }
}
