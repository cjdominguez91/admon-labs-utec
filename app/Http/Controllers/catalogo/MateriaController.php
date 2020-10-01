<?php

namespace App\Http\Controllers\catalogo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\catalogo\Materia;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\catalogo\MateriaFormRequest;
use DB;
use Carbon\Carbon;

class MateriaController extends Controller
{
    public function __construct()
    {
    }
    public function index(Request $request)
    {

        if ($request) {
            if (auth()->user()->can('read software')) {
            $materias = Materia::get();
           // dd($materias);
            return view('catalogo.materia.index', ["materias" => $materias]);
        } else {
            abort(404);
           return view('home');
       }
   }
}
    public function create()
    {
        if (auth()->user()->can('read software')) {
        return view("catalogo.materia.create");
    } else {
        abort(404);
       return view('home');
   }
}

    public function store(MateriaFormRequest $request)
    {
        $materia = new Materia;
        $materia->nombre = $request->get('nombre');
        $materia->timestamp = Carbon::now();
        
        $materia->save();
        alert()->success('El registro ha sido agregado correctamente');
        return Redirect::to('catalogo/materia/create');
    }
    public function show($id)
    {
        return view("catalogo.materia.show", ["materia" => Materia::findOrFail($id)]);
    }
    public function edit($id)
    {

        return view("catalogo.materia.edit", ["materia" => Materia::findOrFail($id)]);
    }
    public function update(MateriaFormRequest $request, $id)
    {
        $materia = Materia::findOrFail($id);
        $materia->nombre = $request->get('nombre');
        $materia->update();
        alert()->info('El registro ha sido modificado correctamente');
        return redirect('catalogo/materia/' . $id . '/edit');
    }
    public function destroy($id)
    {
        $materia = Materia::findOrFail($id);
        $materia->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return Redirect::to('catalogo/materia');
    }
}
