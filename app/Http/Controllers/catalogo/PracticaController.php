<?php
namespace App\Http\Controllers\catalogo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\catalogo\Practica;
use App\catalogo\Horario;
use App\catalogo\Hora;
use App\catalogo\Carrera;
use App\catalogo\Laboratorio;
use App\catalogo\HorasClases;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\catalogo\PracticaFormRequest;
use App\Role;
use App\User;
use DB;
use Carbon\Carbon;

class PracticaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('firstlogin');
    }
    public function index(Request $request)
    {

    }


    public function create()
    {
        
    }

    public function crearPractica($id)
    {
        if (auth()->user()->can('create practicas')) {
            $carreras = Carrera::all();
            return view("catalogo.practica.create", ['id' => $id, 'carreras' => $carreras]);
            
        } else {
            // abort(403);
            return view('home');
        }
    }

    public function store(PracticaFormRequest $request)
    {
        $practica = new Practica;
        $practica->fecha = $request->get('fecha');
        $practica->asistencia = $request->get('asistencia');
        $practica->carrera_id = $request->get('id_carreras');
        $practica->horario_id = $request->get('id_horarios');
        $practica->timestamp = Carbon::now();
        $practica->save();
        $id = $request->get('laboratorio');
        alert()->success('El registro ha sido agregado correctamente');
        return redirect('/practica/'.$id);
    }

    public function show($id)
    {
        return view("catalogo.practica.show", ["practica" => Practica::findOrFail($id)]);
    }


    public function edit($id)
    {

    }

    public function editPractica($id, $lab)
    {
        if (auth()->user()->can('edit practicas')) {
             $practica = Practica::findOrFail($id);
             $carreras = Carrera::all();
             $horarios = Horario::with('hora')->where('dia',$practica->horario->dia)->get();
            return view("catalogo.practica.edit", ['id' => $id, 'practica' => $practica, 'carreras' => $carreras, 'horarios' => $horarios, 'lab' => $lab]);
            
        } else {
            // abort(403);
            return view('home');
        }
    }


    public function update(PracticaFormRequest $request, $id)
    {

        $practica = Practica::findOrFail($id);
        $practica->fecha = $request->get('fecha');
        $practica->asistencia = $request->get('asistencia');
        $practica->carrera_id = $request->get('id_carreras');
        $practica->horario_id = $request->get('id_horarios');
        $practica->update();
        $laboratorio = $request->get('laboratorio');
        alert()->info('El registro ha sido modificado correctamente');
        return redirect('practicas/'. $laboratorio);
    }

    public function destroy(Request $request, $id)
    {
        $laboratorio =  $request->get('laboratorio');
        $practica = Practica::findOrFail($id);
        $practica->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return redirect('practicas/'.$laboratorio);
    }




    

    /* public function add_materia(Request $request)
    {
        $carrera = Carrera::findOrFail($request->get('id'));
        $materia = Materia::findOrFail($request->get('materias'));

        $carrera->carreraMaterias()->attach($request->get('materias'));
        $carrera->save();

        return redirect('catalogo/carrera/' . $carrera->id . '/edit');
    }*/

     public function listarpracticas(Request $request, $id)
    {
        if ($request) {
           if (auth()->user()->can('read practicas')) {
                    //Consultamos los horarios del laboratorio
                    $horarios = Horario::where([['laboratorio_id', $id],['ciclo_id', ciclo()->id]])
                    ->get();
                    //recorremos el horario y accedemos a las practicas

                    return view('catalogo.practica.index', ["horarios" => $horarios, 'id' => $id]);
                
                
            } else {
                // abort(403);
                alert()->warning('No posee un laboratorio asignado');
                return redirect('home');
            }
        }
    }
}
