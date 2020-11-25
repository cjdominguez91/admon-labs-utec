<?php
namespace App\Http\Controllers\catalogo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\catalogo\Practica;
use App\catalogo\Horario;
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

        if ($request) {
           if (auth()->user()->can('read practicas')) {
                 // validamos el rol del usuario   
                foreach(auth()->user()->usersRoles as $rol)
                {
                    if ($rol->name == "super admin") {
                        $rol = $rol->name;
                        $practicas = Practica::with('horario')->get();
                        return view('catalogo.practica.index', ["practicas" => $practicas, 'rol' => $rol]);
                    }
                    else{
                        $rol = $rol->name;         
                        if (auth()->user()->laboratorios->isEmpty()) {
                            return view('catalogo.practica.index', ['rol' => $rol]);
                        }
                        else {                                                                                              
                            // consultamos el id del laboratorio asignado
                            foreach(auth()->user()->laboratorios as $lab) {
                                $id = $lab->id;
                            }
                            //Consultamos los horarios del laboratorio
                            $horarios = Horario::with('practicas')->where('laboratorio_id',"=", $id)->get();
                            //recorremos el horario y accedemos a las practicas
                            foreach ($horarios as $key => $horario) {
                                      $practicas = $horario->practicas;
                            }

                        }

                        if (empty( $practicas)) {
                            return view('catalogo.practica.index', ['idLab' => $id, 'rol' => $rol]);
                        }
                        else {
                            return view('catalogo.practica.index', ["practicas" => $practicas, 'idLab' => $id, 'rol' => $rol]);
                        }

                        
                    }
                }
                
            } else {
                // abort(403);
                alert()->warning('No posee un laboratorio asignado');
                return redirect('home');
            }
        }
    }


    public function create()
    {
        if (auth()->user()->can('create practicas')) {

            foreach(auth()->user()->usersRoles as $rol)
                {
                    if ($rol->name == "super admin") {
                        $laboratorios = Laboratorio::all();
                        $carreras = Carrera::all();
                        return view("catalogo.practica.create", ['laboratorios' => $laboratorios, 'carreras' => $carreras]);
                    }
                    else
                    {
                         foreach(auth()->user()->laboratorios as $lab) {
                            $id = $lab->id;
                        }
                        $carreras = Carrera::all();
                        return view("catalogo.practica.create", ['id' => $id, 'carreras' => $carreras]);
                    }
                }
            
        } else {
            // abort(403);
            return view('home');
        }
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
        alert()->success('El registro ha sido agregado correctamente');
        $id = $request->get('laboratorio');
        $practicas = [];                                                      
        //Consultamos los horarios del laboratorio
        $horarios = Horario::where([['laboratorio_id', $id],['ciclo_id', ciclo()->id]])
        ->paginate(1);
        //recorremos el horario y accedemos a las practicas

        return view('catalogo.practica.index', ["horarios" => $horarios, 'id' => $id]);
    }

    public function show($id)
    {
        return view("catalogo.practica.show", ["practica" => Practica::findOrFail($id)]);
    }
    public function edit($id)
    {
        $practica = Practica::findOrFail($id);
        $carrera = Carrera::get();

        $horas_clases = HorasClases::where('id_horario', '=', $practica->id_horarios)->get();

        $horario = Horario::with('materias')->get();

        return view("catalogo.practica.edit", ["practica" => $practica, Practica::findOrFail($id), "carrera" => $carrera, "horario" => $horario, "horas_clases" => $horas_clases]);
    }
    public function update(PracticaFormRequest $request, $id)
    {

        $practica = Practica::findOrFail($id);
        $practica->fecha = $request->get('fecha');
        $practica->asistencia = $request->get('asistencia');
        $practica->id_carreras = $request->get('carrera');
        $practica->id_horarios = $request->get('id_horarios');
        $practica->update();
        alert()->info('El registro ha sido modificado correctamente');
        return redirect('catalogo/practica/' . $id . '/edit');
    }
    public function destroy($id)
    {
        $practica = Practica::findOrFail($id);
        $practica->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return Redirect::to('catalogo/practica');
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
                    $horarios = Horario::where([['laboratorio_id', $id],['ciclo_id', ciclo()->id]])->paginate(1);
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
