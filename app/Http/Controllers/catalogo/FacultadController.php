<?php

namespace App\Http\Controllers\catalogo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\catalogo\Facultad;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\catalogo\FacultadFormRequest;
use DB;
use Carbon\Carbon;

class FacultadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {

        if ($request) {
            if (auth()->user()->can('read facultades')) {
                $facultades = Facultad::get();
                // dd($facultades);

                return view('catalogo.facultad.index', ["facultades" => $facultades]);
            } else {
                // abort(403);
                return view('home');
            }
        }
    }
    public function create()
    {
        if (auth()->user()->can('create facultades')) {
            return view("catalogo.facultad.create");
        } else {
            // abort(403);
            return view('home');
        }
    }
    public function store(FacultadFormRequest $request)
    {
        $facultad = new Facultad;
        $facultad->nombre = $request->get('nombre');
        $facultad->timestamp = Carbon::now();

        $facultad->save();
        alert()->success('El registro ha sido agregado correctamente');
        return Redirect::to('catalogo/facultad/create');
    }
    public function show($id)
    {
        return view("catalogo.facultad.show", ["facultad" => Facultad::findOrFail($id)]);
    }
    public function edit($id)
    {
        if (auth()->user()->can('edit facultades')) {
            return view("catalogo.facultad.edit", ["facultad" => Facultad::findOrFail($id)]);
        } else {
            // abort(403);
            return view('home');
        }
    }
    public function update(FacultadFormRequest $request, $id)
    {
        $facultad = Facultad::findOrFail($id);
        $facultad->nombre = $request->get('nombre');
        $facultad->update();
        alert()->info('El registro ha sido modificado correctamente');
        return redirect('catalogo/facultad/' . $id . '/edit');
    }
    public function destroy($id)
    {
        $facultad = Facultad::findOrFail($id);
        $facultad->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return Redirect::to('catalogo/facultad');
    }
}
