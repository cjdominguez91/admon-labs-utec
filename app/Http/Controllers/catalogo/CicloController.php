<?php

namespace App\Http\Controllers\catalogo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\catalogo\Ciclo;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\catalogo\CicloFormRequest;
use DB;
use Carbon\Carbon;

class CicloController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('firstlogin');
    }

    public function index(Request $request)
    {

        if ($request) {

            if (auth()->user()->can('read permissions')) {
            $ciclos = Ciclo::all();
            // dd($carreras);
            return view('catalogo.ciclo.index', ["ciclos" => $ciclos]);
        } else {
            // abort(403);
            return  redirect('/home');
        }
    }
}
    public function create()
    {
        if (auth()->user()->can('create permissions')) {
        return view("catalogo.ciclo.create");
    } else {
        // abort(403);
        return view('home');
    }
}
    public function store(CicloFormRequest $request)
    {   
        $ciclo = new Ciclo;
        $ciclo->año = $request->get('año');
        $ciclo->nciclo = $request->get('nciclo');
        $ciclo->codigo = $request->get('nciclo')."-".$request->get('año');
        $ciclo->estatus = "I";
        $ciclo->save();
        alert()->success('El registro ha sido agregado correctamente');
        return Redirect::to('catalogo/ciclo/create');
    }

    public function show($id)
    {
        return view("catalogo.permission.show", ["permission" => Permission::findOrFail($id)]);
    }

    public function edit($id)
    {
        $ciclo = Ciclo::findOrFail($id);
        return view("catalogo.ciclo.edit", ["ciclo" => $ciclo]);
    }

    public function update(CicloFormRequest $request, $id)
    {
        $ciclo = Ciclo::findOrFail($id);
        $ciclo->año = $request->get('año');
        $ciclo->nciclo = $request->get('nciclo');
        $ciclo->codigo = '0'.$request->get('nciclo')."-".$request->get('año');
        $ciclo->update();
        alert()->info('El registro ha sido modificado correctamente');
        return redirect('catalogo/ciclo/' . $id . '/edit');
    }

    public function destroy($id)
    {
        $ciclo = Ciclo::findOrFail($id);
        $ciclo->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return Redirect::to('catalogo/ciclo');
    }

}
