<?php

namespace App\Http\Controllers\catalogo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\catalogo\Software;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\catalogo\SoftwareFormRequest;
use DB;
use Carbon\Carbon;

class SoftwareController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('firstlogin');
    }
    public function index(Request $request)
    {

        if ($request) {
            if (auth()->user()->can('read software')) {
                $softwares = Software::orderBy('id','Desc')->paginate(2);
                
                // dd($es);

                return view('catalogo.software.index', ["softwares" => $softwares]);
            } else {
                 abort(404);
                return view('home');
            }
        }
    }
    public function create()
    {
        if (auth()->user()->can('create software')) {
            return view("catalogo.software.create");
       
        } else {
            // abort(403);
            return view('home');
        }
    }
    public function store(SoftwareFormRequest $request)
    {
        $software = new Software;
        $software->nombre = $request->get('nombre');
        $software->timestamp = Carbon::now();

        $software->save();
        alert()->success('El registro ha sido agregado correctamente');
        return Redirect::to('catalogo/software/create');
    }
    public function show($id)
    {
        return view("catalogo.software.show", ["software" => Software::findOrFail($id)]);
    }
    public function edit($id)
    {
        if (auth()->user()->can('edit software')) {
            return view("catalogo.software.edit", ["software" => Software::findOrFail($id)]);
        } else {
            // abort(403);
            return view('home');
        }
    }
    public function update(SoftwareFormRequest $request, $id)
    {
        $software = Software::findOrFail($id);
        $software->nombre = $request->get('nombre');
        $software->update();
        alert()->info('El registro ha sido modificado correctamente');
        return redirect('catalogo/software/' . $id . '/edit');
    }
    public function destroy($id)
    {
        $software = Software::findOrFail($id);
        $software->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return Redirect::to('catalogo/software');
    }
}
