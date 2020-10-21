<?php

namespace App\Http\Controllers\catalogo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    public function add_permiso(Request $request)
    {
        $rol = Role::findOrFail($request->get('id'));        
        $permiso = Permission::findOrFail($request->get('Permission'));    

        $rol->givePermissionTo($permiso->name);
        alert()->info('El registro ha sido modificado correctamente');
        return redirect('catalogo/roles/' . $request->get('id') . '/edit');
    }

    public function delete_permiso(Request $request)
    {
        $permiso = Permission::findOrFail($request->get('Permission'));
        $role = Role::findOrFail($request->get('role'));

        $role->revokePermissionTo($permiso->name);
        alert()->info('El registro ha sido modificado correctamente');
        return redirect('catalogo/roles/' . $request->get('role') . '/edit');
    }
}
