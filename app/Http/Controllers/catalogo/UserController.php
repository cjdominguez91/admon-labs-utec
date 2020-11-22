<?php
namespace App\Http\Controllers\catalogo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;
use App\Role;
use DB;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->can('read users')) {
            $query=trim($request->get('searchText'));

            $usuarios = User::with('usersRoles')->where('nombres','LIKE','%'.$query.'%')->paginate(2);
            return view('catalogo.user.index', ["usuarios" => $usuarios,"searchText"=>$query]);
        } else {
            return 'Error';
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->can('create users')) {
        $roles = Role::all();
        return view("catalogo.user.create", ["roles" => $roles]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('catalogo.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('catalogo.user.edit',['user' => $user , 'roles' => $roles]);
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
        $name = 'user.png';

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName(); 
            $file->move(public_path().'/img/', $name);
        }

        $usuario = User::findOrFail($id);
        $usuario->nombres = $request->get('nombres');
        $usuario->apellidos = $request->get('apellidos');
        $usuario->email = $request->get('email');
        $usuario->avatar = $name;    
        $usuario->update();
        alert()->info('El registro ha sido modificado correctamente');
        return redirect('catalogo/user/' . $id . '/edit');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->estatus = 'I';
        $user->fecha_baja = Carbon::now();
        $user->update();
        
    }

    public function firstLogin(){
        $user = User::findOrFail(auth()->user()->id);
        return view('auth.firstLogin',['user' => $user]);
    }

    public function setPass(Request $request, $id){
        $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $usuario = User::findOrFail($id);
        $usuario->password = Hash::make($request->get('password'));
        $usuario->primer_ingreso = 1;
        $usuario->update();
        Auth::logout();
        return redirect('/login');
    }

}
