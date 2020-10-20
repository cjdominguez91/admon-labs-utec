<?php

namespace App\Http\Controllers\catalogo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\catalogo\Horario;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\catalogo\HorarioFormRequest;
use DB;
use Carbon\Carbon;

class horarioControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horarios = Horario::get();
            //echo "Hola desde horarioControler";
        return view('catalogo.laboratorio.custom', ["horarios"=>$horarios]);
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
        $horario = new Horario;
        $horario->inicio = $request->get('inicio');
        $horario->final = $request->get('final');
        $horario->dia = $request->get('dia');
        $horario->ciclo = $request->get('ciclo');
        $horario->id_laboratorio = 1;
        $horario->id_materia = 1;
        $horario->timestamp = Carbon::now(); 
        $horario->alerta_seminario = "";
        return $horario->save();
        // alert()->success('El registro ha sido agregado correctamente');
        // return Redirect::to('catalogo/horario/create');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
