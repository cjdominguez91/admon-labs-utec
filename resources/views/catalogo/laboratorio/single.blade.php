@extends ('layouts.app')
@section ('h2',"Información del Laboratorio")
@section ('content')
        <div class="row mt-5">
                    <div class="col-md-4 col-sm-12 text-center ml-5">
                        <img src="../img/laboratorios/{{$imagen_lab}}" alt="" width="317" height="180">
                    </div>
                    <div class="col-md-5 col-sm-12 ml-4">
                        <table>
                            <th colspan="2">
                                <h5><span class="badge badge-dark p-1"> {{$nom_lab}}</span></h5>
                            </th>
                            <tr>
                                <td><b>Ubicación:</b> <span> {{$ubica_lab}}</span></td>
                            </tr>
                            <tr>
                                <td><b>Equipos Disponibles:</b> {{$cant_lab}} <span></span></td>
                            </tr>
                            <tr>
                                <td><b>Encargado:</b> <span> {{$nombre_encargado}} </span></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row d-flex justify-content-center mt-4">
                    <div class="col-md-2 col-sm-12"> 
                        <span class="badge badge-info">&nbsp &nbsp &nbsp &nbsp &nbsp</span> &nbsp Practica Libre
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <span class="badge badge-danger">&nbsp &nbsp &nbsp &nbsp &nbsp</span> &nbsp Alerta Seminarios
                    </div>
                </div>
                <h4 class="mt-4 text-center">HORARIOS ESTABLECIDOS PARA EL CICLO 01-2021</h4>
                <div class="row d-flex align-items-end">
  
                    </div>
                    <div class="row ">
                        
                    </div>
                <table class="table table-sm text-center my-5 table-responsive-sm">
                    <thead class="text-light">
                        <th>#</th>
                        <th>Laboratorio</th>
                        <th>Ciclo</th>
                        <th>Dia</th>
                        <th>Horario</th>
                        <th>Materia</th>
                        <th>Seminarios</th>
                    </thead>
                    <tbody>
                     @foreach($horarios as $horario)
                        @if($horario->estado == 1)
                        <tr>
                            <td>{{$horario->id}}</td>
                            <td>{{$horario->laboratorio->nombre}}</td>
                            <td>{{$horario->ciclo->año."-0".$horario->ciclo->nciclo}}</td>
                            <td>{{$horario['dia']}}</td>
                            <td>{{$horario->hora->hora_inicio."-".$horario->hora->hora_fin}}</td>
                            <td>
                                @if($horario->materia->nombre=="Practica Libre")
                                    <span class="badge badge-info">Practica Libre</span> &nbsp 
                                @else
                                    {{$horario->materia->nombre}}
                                @endif
                            </td>
                            <td>
                                @if($horario->alerta_seminarios!="")
                                    <span class="badge badge-danger">Alerta Seminarios</span>
                                    <br>{{$horario['alerta_seminarios']}}
                                @endif  
                            </td>
                            
                        </tr>
                        @include('catalogo.horario.modal')
                        @endif
                    @endforeach
                    </tbody>
                </table>

                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-md-6 col-sm-12">
                        <div class="card py-4 px-5">
                            <div class="card-body">
                                <span class="text-center soft-tittle bg-dark">Software Disponible</span>
                                <p class="text-justify mt-5 text-dark">
                        @foreach($soft_lab->softwares as $obj)
                                {{$obj->nombre}}//
                        @endforeach
                                </p>
                            </div>
                        </div> 
                    </div>
                    
                </div>

@endsection