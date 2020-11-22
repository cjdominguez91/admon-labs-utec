<?php

namespace App\Http\Controllers\reporte;

use App\catalogo\Practica;
use App\catalogo\Horario;
use App\catalogo\Carrera;
use App\catalogo\Laboratorio;
use App\catalogo\HorasClases;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class HorarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        return view('reporte.reporte');
    }

    public function reporte_aceptar(Request $request)
    {
        $fecha_inicio =  $request->get('fecha_inicio');
        $fecha_final =  $request->get('fecha_fin');
        if ($request->get('reporte') == 1) {
            $data = DB::table('practica as p')
                ->join('carrera as c', 'p.carrera_id', '=', 'c.id')
                ->select(DB::raw('count(*) as conteo, p.carrera_id'), 'c.nombre')
                ->whereBetween('fecha', [$fecha_inicio, $fecha_final])
                ->groupBy('p.carrera_id', 'c.nombre')
                ->take(10)
                ->orderBy('conteo', 'desc')
                ->get();

            //  dd($data);

            return view('reporte.carrera', ['data' => $data]);
        } else {


            $fecha_inicio =  $request->get('fecha_inicio');
            $fecha_final =  $request->get('fecha_fin');
            if ($request->get('reporte') == 2) {
                $data = DB::table('practica as p')
                    ->join('horario as h', 'p.horario_id', '=', 'h.id')
                    ->join('horas_clases as cl', 'h.hora_id', '=', 'cl.id')
                    ->select(DB::raw('count(p.id) as conteo, cl.horario'), 'cl.horario')
                    ->whereBetween('fecha', [$fecha_inicio, $fecha_final])
                    ->groupBy( 'cl.horario')
                    ->take(10)
                    ->orderBy('conteo', 'desc')
                    ->get();
                // dd($data);


                return view('reporte.horario', ['data' => $data]);
            } else {


                $fecha_inicio =  $request->get('fecha_inicio');
                $fecha_final =  $request->get('fecha_fin');
                if ($request->get('reporte') == 3) {
                     $data = DB::table('practica as p')
                    ->join('horario as h', 'p.horario_id', '=', 'h.id')
                    ->join('laboratorio as l', 'h.laboratorio_id', '=', 'l.id')                    
                    ->select(DB::raw('count(p.id) as conteo, l.id'), 'l.nombre')
                    ->whereBetween('fecha', [$fecha_inicio, $fecha_final])
                    ->groupBy('l.id','l.nombre')
                    ->take(10)
                    ->orderBy('conteo', 'desc')
                    ->get();
                   
               

                   // dd($data);


                    return view('reporte.laboratorio', ['data' => $data]);
                }
            }
        }
    }
}
