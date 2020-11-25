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

class ReporteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        return view('reporte.reporte');
    }
// Este trae informacion de CARRERAS CON MAS PRACTICAS LIBRES
    public function reporte_aceptar(Request $request)
    {   
        
        $fecha_inicio =  $request->get('fecha_inicio');
        $fecha_final =  $request->get('fecha_fin');
        $total = DB::table('practica')->whereBetween('fecha', [$fecha_inicio, $fecha_final])->sum('asistencia');
        if ($request->get('reporte') == 1) {
            $data = DB::table('practica as p')
                ->join('carrera as c', 'p.carrera_id', '=', 'c.id')
                ->select(DB::raw('sum(p.asistencia) as conteo'), 'c.nombre')
                ->whereBetween('fecha', [$fecha_inicio, $fecha_final])
                ->groupBy( 'c.nombre')
                ->take(13)
                ->orderBy('conteo', 'desc')
                ->get();

            //  dd($data);

            return view('reporte.carrera', ['data' => $data, 'total' => $total, 'f1' => $fecha_inicio, 'f2' => $fecha_final]);
        } else {

        // Este trae informacion de HORARIOS  MÁS FRECUENTADOS

            $fecha_inicio =  $request->get('fecha_inicio');
            $fecha_final =  $request->get('fecha_fin');
            $total = DB::table('practica')->whereBetween('fecha', [$fecha_inicio, $fecha_final])->sum('asistencia');
            if ($request->get('reporte') == 2) {
                $data = DB::table('practica as p')
                    ->join('horario as h', 'p.horario_id', '=', 'h.id')
                    ->join('horas_clases as cl', 'h.hora_id', '=', 'cl.id')
                    ->select(DB::raw('sum(p.asistencia) as conteo'), 'cl.horario')
                    ->whereBetween('fecha', [$fecha_inicio, $fecha_final])
                    ->groupBy( 'cl.horario')
                    ->take(10)
                    ->orderBy('conteo', 'desc')
                    ->get();
                // dd($data);


                return view('reporte.horario', ['data' => $data, 'total' => $total, 'f1' => $fecha_inicio, 'f2' => $fecha_final]);
            } else {

            // Este trae informacion de LABORATORIOS  MÁS VISITADOS
                $fecha_inicio =  $request->get('fecha_inicio');
                $fecha_final =  $request->get('fecha_fin');
                $total = DB::table('practica')->whereBetween('fecha', [$fecha_inicio, $fecha_final])->sum('asistencia');
                if ($request->get('reporte') == 3) {
                     $data = DB::table('practica as p')
                    ->join('horario as h', 'p.horario_id', '=', 'h.id')
                    ->join('laboratorio as l', 'h.laboratorio_id', '=', 'l.id')                    
                    ->select(DB::raw('sum(p.asistencia) as conteo, l.id'), 'l.nombre')
                    ->whereBetween('fecha', [$fecha_inicio, $fecha_final])
                    ->groupBy('l.id','l.nombre')
                    ->take(10)
                    ->orderBy('conteo', 'desc')
                    ->get();
                   
               

                   // dd($data);


                    return view('reporte.laboratorio', ['data' => $data, 'total' => $total, 'f1' => $fecha_inicio, 'f2' => $fecha_final]);
                }
            }
        }
    }
}

