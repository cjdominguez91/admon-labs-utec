<?php

namespace App\Http\Controllers\catalogo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\catalogo\Horario;
use App\catalogo\Laboratorio;
use App\catalogo\Materia;
use App\catalogo\Hora;
use App\catalogo\Ciclo;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\catalogo\HorarioFormRequest;
use DB;
use Carbon\Carbon;





class horarioControler extends Controller
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
        $ciclos = Ciclo::get();
        $materias = Materia::get();
        $horarios = Horario::with('laboratorio', 'materia', 'hora', 'ciclo')->get();
        return view('catalogo.horario.custom', ["horarios"=>$horarios, "ciclos"=>$ciclos, "materias"=>$materias, "horas"=>$horas]);
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
        $horario->dia = $request->get('dia');
        $horario->hora_id = $request->get('horas');
        $horario->materia_id = $request->get('materia');
        $horario->ciclo_id = $request->get('ciclo');
        $horario->laboratorio_id = $request->get('laboratorio');
        $horario->alerta_seminarios = "";
        $horario->clave = "d-".$request->get('dia')."-h-".$request->get('horas')."-c-".$request->get('ciclo')."-L-".$request->get('laboratorio');
        $horario->estado = 1;
        $horario->timestamp = Carbon::now(); 
      
        if( count(Horario::where('clave', $horario->clave)->get() ) > 0 )
        {
            alert()->error('No puede ingresar horario, debido que ya existe para este laboratorio');
        }
        else
        {
            $horario->save();
            alert()->success('El registro ha sido agregado correctamente'); 
        }
        return Redirect::to('catalogo/horario');
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
        $horas = Hora::get();
        $ciclos = Ciclo::get();
        $materias = Materia::get();
        $horarios = Horario::with('laboratorio', 'materia', 'hora', 'ciclo')->get();
        $horariosEdit = Horario::findOrFail($id);
        return view("catalogo.horario.custom", ["horariosEdit" => $horariosEdit, "horarios"=>$horarios, "ciclos"=>$ciclos, "materias"=>$materias, "horas"=>$horas]);            
            alert()->error('Acceso Denegado. Este horario esta inhabilitado');

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
        $horario = Horario::findOrFail($id);
        $horario->dia = $request->get('dia');
        $horario->hora_id = $request->get('horas');
        $horario->materia_id = $request->get('materia');
        $horario->ciclo_id = $request->get('ciclo');
        $horario->alerta_seminarios = $request->get('alerta_seminarios');
        $horario->clave = "d-".$request->get('dia')."-h-".$request->get('horas')."-c-".$request->get('ciclo')."-L-".$request->get('laboratorio');
        
        if( count(Horario::where('clave', $horario->clave)->get() ) > 0 )
        {
            alert()->error('No puede actualizar horario, debido que ya existe para este laboratorio');
        }
        else
        {
            $horario->update();
            alert()->info('El registro ha sido modificado correctamente');
        } 
    

        return redirect('catalogo/horario/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();
        alert()->error('El registro ha sido inhabilitado correctamente');
        return Redirect::to('catalogo/horario');
    }



        public function actualizarEquipo(Request $request, $id)
    {
        //
    }
}
