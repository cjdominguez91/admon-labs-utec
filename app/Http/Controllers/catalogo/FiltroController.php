<?php

namespace App\Http\Controllers\catalogo;

use App\catalogo\Horario;
use App\catalogo\Laboratorio;
use App\catalogo\Materia;
use App\catalogo\Hora;
use App\catalogo\Ciclo;
use App\catalogo\HorasClases;
use App\catalogo\Software;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class FiltroController extends Controller
{
    

    public function filtroPorhorario($horario)
    {

        $horario = Horario::where($horario = $horario)->with('laboratorio')->get();
        $laboratorios = $horario->laboratorios;
        return $laboratorios;
    }

    public function filtroPorLab($laboratorios)
    {

        $laboratorios = Laboratorio::where($laboratorios = $laboratorios)->with('Ubicacion')->get();
       
        return $laboratorios;
    }
    
    
   
   
   

    

    public function getData($id)
    {
        $i=0;
        if ($id == 1) {
            $data = DB::table('laboratorio')->distinct()->get();
           
        }
        else if ($id == 2) {
            $data =  DB::table('horas_clases')->distinct()->get(); 
        }
        else if ($id == 3) {
            $data =   $data =  DB::table('software')->distinct()->get();           

        }

        return $data;
    }
   
    public function filtrado($tipo, $par1, $par2)
    {
        switch ($tipo) {
            case '1':
                $laboratorios =  DB::table('laboratorio')->where('ubicacion',$par1)->get();  
            break ;
            case '2':
                $laboratorios =  Laboratorio::join('horario', 'laboratorio.id', '=', 'horario.laboratorio_id')->where([['dia', $par2], ['materia_id',6], ['hora_id', $par1]])->get();
            break ;
            case '3':
                $laboratorios = Software::with('laboratorios')->where('id', $par1)->get();
            break ;
            
        }
        
       
        return $laboratorios;
    }





}
