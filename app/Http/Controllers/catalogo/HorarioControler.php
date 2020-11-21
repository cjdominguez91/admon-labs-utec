<?php

namespace App\Http\Controllers\catalogo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\catalogo\Horario;
use App\catalogo\Laboratorio;
use App\catalogo\Materia;
use App\catalogo\Hora;
use App\catalogo\Ciclo;
use App\catalogo\Software;
use App\catalogo\LaboratorioSoftware;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\catalogo\HorarioFormRequest;
use DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use PHPExcel; 
use PHPExcel_IOFactory;

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
        $laboratorio = auth()->user()->laboratorio;
        foreach($laboratorio as $obj) 
        {
          $nom_lab = $obj->nombre;
          $ubica_lab = $obj->ubicacion;
          $cant_lab = $obj->cant_equipo;
          $imagen_lab = $obj->imagen;
          //$soft_lab = $obj->software;
          $id_lab = $obj->id;
        }

        //$laboratorio->softwares()->attach($request->id_soft);

        //echo $resp;

        $usuario = auth()->user()->nombres.", ".auth()->user()->apellidos;
        $lab_soft = Laboratorio::findOrFail($id_lab);
        $horas = Hora::get();
        $ciclos = Ciclo::get();
        $materias = Materia::get();
        $software = Software::get();
        $horarios = Horario::with('laboratorio', 'materia', 'hora', 'ciclo')->where([['laboratorio_id', '=', $id_lab]])->get();
        //Horario::with('hora')->where([['laboratorio_id', '=', $id],['dia', '=', $dia]])->get();

        return view('catalogo.horario.custom', ["horarios"=>$horarios, "ciclos"=>$ciclos, "materias"=>$materias, "horas"=>$horas, "nom_lab"=>$nom_lab, "ubica_lab"=>$ubica_lab, "cant_lab"=>$cant_lab, "imagen_lab"=>$imagen_lab, "software"=>$software, "lab_soft"=>$lab_soft, "id_lab"=>$id_lab, "usuario"=>$usuario]);
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
      
        try 
        { 
            $horario->save();
            alert()->success('El registro ha sido agregado correctamente'); 
        } 
        catch(\Illuminate\Database\QueryException $ex)
        { 
            //dd($ex->getMessage()); 
            alert()->error('No puede ingresar horario, debido que ya existe para este laboratorio');
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

        $laboratorio = auth()->user()->laboratorio;
        foreach($laboratorio as $obj) 
        {
          $nom_lab = $obj->nombre;
          $ubica_lab = $obj->ubicacion;
          $cant_lab = $obj->cant_equipo;
          $imagen_lab = $obj->imagen;
          $soft_lab = $obj->software;
          $id_lab = $obj->id;
        }
        $usuario = auth()->user()->nombres.", ".auth()->user()->apellidos;

        $horas = Hora::get();
        $ciclos = Ciclo::get();
        $materias = Materia::get();
        $horarios = Horario::with('laboratorio', 'materia', 'hora', 'ciclo')->get();
        $horariosEdit = Horario::findOrFail($id);
        return view("catalogo.horario.custom", ["horariosEdit" => $horariosEdit, "horarios"=>$horarios, "ciclos"=>$ciclos, "materias"=>$materias, "horas"=>$horas, "nom_lab"=>$nom_lab, "ubica_lab"=>$ubica_lab, "cant_lab"=>$cant_lab, "imagen_lab"=>$imagen_lab, "soft_lab"=>$soft_lab, "id_lab"=>$id_lab, "usuario"=>$usuario]);            

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
        try 
        { 
            $horario->update();
            alert()->info('El registro ha sido modificado correctamente');
        } 
        catch(\Illuminate\Database\QueryException $ex)
        { 
            //dd($ex->getMessage()); 
            alert()->error('No puede actualizar horario, debido que ya existe para este laboratorio');
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
        alert()->error('El registro ha sido eliminado correctamente');
        return Redirect::to('catalogo/horario');
    }








    public function getHorarios($id, $dia){
        //Definir el id de Materia Practica Libre
        return Horario::with('hora')->where([['laboratorio_id', '=', $id],['dia', '=', $dia]])->get();

    }









        public function actualizarEquipo(Request $request, $id)
    {
        //
    }






    public function exportarExcel()
    {
        $laboratorio = auth()->user()->laboratorio;
        foreach($laboratorio as $obj) 
        {
          $id_lab = $obj->id;
        }
        $ciclo="1";
        $laboratorio=$id_lab; 
        $materias = Materia::get();
        $horas = Hora::get();
        $laboratorios = Laboratorio::where('id', $laboratorio)->get();
        $ciclos = Ciclo::where('id', $ciclo)->get();

        $objPHPExcel = new PHPExcel();
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objPHPExcel = $objReader->load('../storage/app/plantillahorarios.xlsx');        
        $objPHPExcel->setActiveSheetIndex(0);

        $fila = 9;
        foreach ($materias as $row) 
        {
            $objPHPExcel->getActiveSheet()->SetCellValue('L'.$fila, $row->nombre);
            $objPHPExcel->getActiveSheet()->SetCellValue('M'.$fila, $row->id);
            $fila++;
        }

        $fila = 9;
        foreach ($horas as $row) 
        {
            $objPHPExcel->getActiveSheet()->SetCellValue('G'.$fila, $row->horario);
            $objPHPExcel->getActiveSheet()->SetCellValue('H'.$fila, $row->id);
            $fila++;
        }
        foreach ($ciclos as $row) 
        {
            $objPHPExcel->getActiveSheet()->SetCellValue('K9', $row->id);
            $objPHPExcel->getActiveSheet()->SetCellValue('O9', $row->codigo);    
        }
        foreach ($laboratorios as $row) 
        {
            $objPHPExcel->getActiveSheet()->SetCellValue('I9', $row->nombre);
            $objPHPExcel->getActiveSheet()->SetCellValue('J9', $row->id);  
        }

        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setVisible(false);  
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setVisible(false); 
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setVisible(false); 
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setVisible(false); 
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setVisible(false); 
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setVisible(false); 
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setVisible(false); 
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setVisible(false);   
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setVisible(false);  
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setVisible(false);  
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setVisible(false);         
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $nom_archivo = "PlantillaHorarios-".date("Y-n-j H-i-s").".xlsx";
        $objWriter->save("../storage/app/".$nom_archivo);
        
        /*$file= public_path()."/../storage/app/".$nom_archivo; 
        $headers = ['Content-Type' => 'application/xlsx', ]; 
        return response()->download($file, $nom_archivo, $headers);
        Storage::delete($nom_archivo); */
        header("Content-disposition: attachment; filename=".$nom_archivo);
        header("Content-type: application/xlsx");
        readfile("../storage/app/".$nom_archivo);
        unlink("../storage/app/".$nom_archivo);  
    }











    public function importarExcel(Request $request)
    {
       $file = $request->file('file'); 
       $nombre = $file->getClientOriginalName();//obtenemos el nombre del archivo     
       \Storage::disk('local')->put($nombre,  \File::get($file));//indicamos que queremos guardar un nuevo archivo en el disco local
       //return "archivo guardado";

        $objPHPExcel = PHPExcel_IOFactory::load("../storage/app/".$nombre); 
        $objPHPExcel->setActiveSheetIndex(0);

        $ciclo = $objPHPExcel->getActiveSheet()->getCell('K9')->getCalculatedValue();
        $laboratorio = $objPHPExcel->getActiveSheet()->getCell('J9')->getCalculatedValue();

        $mensaje = "";
        $fila=8;
        do
        {
            $dia = $objPHPExcel->getActiveSheet () ->getCell('A'.$fila)->getCalculatedValue();
            $hora_nombre = $objPHPExcel->getActiveSheet () ->getCell('C'.$fila)->getCalculatedValue();
            $lab_nombre = $objPHPExcel->getActiveSheet () ->getCell('E'.$fila)->getCalculatedValue();
            if($dia!="" & $hora_nombre!="" & $lab_nombre!="")
            {
                $id_hora = $objPHPExcel->getActiveSheet () ->getCell('B'.$fila)->getCalculatedValue();
                $id_materia = $objPHPExcel->getActiveSheet () ->getCell('D'.$fila)->getCalculatedValue();

                $horario = new Horario;
                $horario->dia = $dia;
                $horario->hora_id = $id_hora;
                $horario->materia_id = $id_materia;
                $horario->ciclo_id = $ciclo;
                $horario->laboratorio_id = $laboratorio;
                $horario->alerta_seminarios = "";
                $horario->clave = "d-".$dia."-h-".$id_hora."-c-".$ciclo."-L-".$laboratorio;
                $horario->estado = 1;
                $horario->timestamp = Carbon::now(); 
                try 
                { 
                    $horario->save();
                     $mensaje = $mensaje."<br><span class='badge badge-info'><h5>Se inserto correctamente horario de la fila: Fila No.".$fila."</h5></span>";
                } 
                catch(\Illuminate\Database\QueryException $ex)
                {
                    $mensaje = $mensaje."<br><span class='badge badge-danger'><h5>El horario de la siguiente fila ya existe, no se inserto: Fila No.".$fila."</h5></span>"; 
                }
            }
            else
            {
                $mensaje = $mensaje."<br><span class='badge badge-danger'><h5>El horario de la siguiente fila no se ingreso, porque no se completo todas las celdas: Fila No.".$fila."</h5></span>"; 
            }                           
            $fila++;
        } 
        while($dia!="");    
        $fila = $fila - 2; 
        $mensaje = $mensaje."<hr><span class='badge badge-success'><h5>Finalizo la insersión masiva de horarios. finalizo en la siguiente fila: Fila No.".$fila."<br>La carga masiva finaliza al estar la celda.. dia vacia</h5></span>"; 
        unlink("../storage/app/".$nombre);

        return view('catalogo.horario.impoexcelMensaje', ["mensaje"=>$mensaje]);    
    }















    public function actualizarInfoLab(Request $request)
    {
        $laboratorio = auth()->user()->laboratorio;
        foreach($laboratorio as $obj) 
        {
          $name = $obj->imagen;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = time().$file->getClientOriginalName(); 
            $file->move(public_path().'/img/laboratorios/', $name);
        }

        /*echo $request->get('id')."<br>";
        echo $request->get('software')."<br>";
        echo $request->get('equipos')."<br>";*/



        $lab = Laboratorio::findOrFail($request->get('id'));
        $lab->cant_equipo = $request->get('equipos');
        //$lab->software = $request->get('software');
        $lab->imagen = $name;  
        $lab->update();
        alert()->info('La información de laboratorio fue actualizada exitosamente');
        return redirect('catalogo/horario/');
    }











    public function agregarSoftware(Request $request)
    {
        $laboratorio = Laboratorio::findOrFail($request->id_lab);
        $laboratorio->softwares()->attach($request->id_soft);

        $resp = "";
        foreach ($laboratorio->softwares as $obj ) 
        {   
            $resp = $resp . " // " . $obj->nombre . '
                  <a href="#" onclick="EliminarSoft( '.$request->id_soft.', '.$request->id_lab.' )"><i class="fa fa-trash fa-lg"></i></a>//';
        }

        echo $resp;
    }


    public function quitarSoftware(Request $request)
    {
        $laboratorio = Laboratorio::findOrFail($request->id_lab);
        $laboratorio->softwares()->dettach($request->id_soft);

        $resp = "";
        foreach ($laboratorio->softwares as $obj ) 
        {   
            $resp = $resp . " // " . $obj->nombre . '
                  <a href="#" onclick="EliminarSoft( '.$request->id_soft.', '.$request->id_lab.' )"><i class="fa fa-trash fa-lg"></i></a>//'; 
        }

        echo $resp;
    }


}
