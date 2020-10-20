<?php

namespace App\Http\Controllers\catalogo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Permission;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\catalogo\PermissionFormRequest;
use DB;
use Carbon\Carbon;

class PermissionController extends Controller
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
            $permissions = Permission::all();
            // dd($carreras);
            return view('catalogo.permission.index', ["permissions" => $permissions]);
        } else {
            // abort(403);
            return  redirect('/home');
        }
    }
}
    public function create()
    {
        if (auth()->user()->can('create permissions')) {
        return view("catalogo.permission.create");
    } else {
        // abort(403);
        return view('home');
    }
}
    public function store(PermissionFormRequest $request)
    {   
        $permission = new Permission;
        $permission->name = $request->get('name');
        $permission->guard_name = 'web';
        $permission->save();
        alert()->success('El registro ha sido agregado correctamente');
        return Redirect::to('catalogo/permission/create');
    }

    public function show($id)
    {
        return view("catalogo.permission.show", ["permission" => Permission::findOrFail($id)]);
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view("catalogo.permission.edit", ["permission" => $permission]);
    }

    public function update(PermissionFormRequest $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->name = $request->get('name');
        $permission->update();
        alert()->info('El registro ha sido modificado correctamente');
        return redirect('catalogo/permission/' . $id . '/edit');
    }

    public function destroy($id)
    {
        $carrera = Permission::findOrFail($id);
        $carrera->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return Redirect::to('catalogo/permission');
    }

}
