<?php

namespace App\Http\Controllers\catalogo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\catalogo\RolesFormRequest;
use App\Role;
use App\Permission;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {

        if ($request) {
            if (auth()->user()->can('read roles')) {
                $roles = Role::get();
                // dd($roleses);

                return view('catalogo.roles.index', ["roles" => $roles]);
            } else {
                // abort(403);
                return view('home');
            }
        }
    }
    public function create()
    {
        if (auth()->user()->can('create roles')) {
            return view("catalogo.roles.create");
        } else {
            // abort(403);
            return view('home');
        }
    }
    public function store(RolesFormRequest $request)
    {
        $roles = Role::create(['name' => $request->get('name')]);
        

        $roles->save();
        alert()->success('El registro ha sido agregado correctamente');
        return Redirect::to('catalogo/roles/create');
    }
    public function show($id)
    {
        return view("catalogo.roles.show", ["roles" => Role::findOrFail($id)]);
    }
    public function edit($id)
    {
        if (auth()->user()->can('edit roles')) {

            $rol =  Role::findOrFail($id);  
            $permisos_actuales = $rol->rolePermissions; 
            //dd($permisos_actuales);
            $Permission = Permission::get();

            return view("catalogo.roles.edit", ["roles" => Role::findOrFail($id),  "Permission" => $Permission,"permisos_actuales"=>$permisos_actuales ]);
            


        } else {
            // abort(403);
            return view('home');
        }
    }
    public function update(RolesFormRequest $request, $id)
    {
        $roles = Role::findOrFail($id);
        $roles->name = $request->get('name');
        $roles->update();
        alert()->info('El registro ha sido modificado correctamente');
        return redirect('catalogo/roles/' . $id . '/edit');

       
    }
    public function destroy($id)
    {
        $roles = Role::findOrFail($id);
        $roles->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return Redirect::to('catalogo/roles');


       
    }

   
}
