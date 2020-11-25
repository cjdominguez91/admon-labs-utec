<?php

namespace App\Http\Controllers\catalogo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\catalogo\Horario;
use App\catalogo\Laboratorio;
use App\catalogo\Materia;
use App\catalogo\Hora;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\catalogo\HoraFormRequest;
use DB;
use Carbon\Carbon;

class horaControler extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horas = Hora::get();
        return view('catalogo.horas.index', ['horas' => $horas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $horas = new Hora;
        $horas->hora_inicio = $request->get('hora_inicio');
        $horas->hora_fin = $request->get('hora_final');
        $horas->horario = $request->get('hora_inicio')." - ".$request->get('hora_final'); 
        $horas->estado = 1;
        if( count(Hora::where('horario', $horas->horario)->get() ) > 0 )
        {
            alert()->error('No puede ingresar hora, debido que ya existe para este laboratorio');
        }
        else
        {
            $horas->save();
            alert()->success('El registro ha sido agregado correctamente');
        }
        return Redirect::to('catalogo/horas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $horasEdit = Hora::findOrFail($id);
        $horas = Hora::get();
        return view("catalogo.horas.index", ["horasEdit" => $horasEdit, "horas"=>$horas]);
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
        $horas = Hora::findOrFail($id);
        $horas->hora_inicio = $request->get('hora_inicio');
        $horas->hora_fin = $request->get('hora_final');
        $horas->horario = $request->get('hora_inicio')." - ".$request->get('hora_final'); 
        if( count(Hora::where('horario', $horas->horario)->get() ) > 0 )
        {
            alert()->error('No puede actualizar Horas, debido que ya existe un registro identico');
        }
        else
        {
            $horas->update();
            alert()->info('El registro ha sido modificado correctamente');
        }    
        return redirect('catalogo/horas/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $horas = Hora::findOrFail($id);
        $horas->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return Redirect::to('catalogo/horas');
    }



        public function actualizarEquipo(Request $request, $id)
    {
        //
    }
}
