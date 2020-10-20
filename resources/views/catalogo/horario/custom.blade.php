
@extends ('sidebar.superadmin')
@section ('TituloVista', 'Información de Laboratorio')
@section ('contenido')
<script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>

 




   <!-- Laboratorios -->
    <div class="row mt-5">
        <div class="col-4 text-center ml-5">
            <img src="img/card.png" alt="" width="317" height="180">
        </div>
        <div class="col-5 ml-4">
            <table>
                <th colspan="2">
                    <h5><span class="badge badge-dark p-1">Laboratorio 2</span></h5>
                </th>
                <tr>
                    <td><b>Ubicación:</b> <span>Edificio Simon Bolivar</span></td>
                </tr>
                <tr>
                    <td><b>Equipos Disponibles:</b> <span>60</span></td>
                </tr>
                <tr>
                    <td><b>Encargado:</b> <span>Carlos Chavarria</span></td>
                </tr>
            </table>
        </div>
    </div>
    &nbsp


















        
    <!-- Registro horarios -->

    @if(empty($horariosEdit))
    <div class="card" id="cardRegistrar">
        <h5 class="card-header bg-light"> Registro de Horarios</h5>
        <div class="card-body">
            {!!Form::open(array('url'=>'catalogo/horario','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <form>
            <div class="row ">

                <div class="col-2">Ciclo:
                    <select required class="form-control @error('ciclo') is-invalid @enderror" name="ciclo" id="ciclo" value="{{ old('ciclo') }}">
                        <option value="">Elige Ciclo-</option>
                        @foreach($ciclos as $obj)
                            <option value="{{$obj->id}}">
                                {{$obj->año."-0".$obj->nciclo}}
                            </option>
                        @endforeach
                    </select>
                      @error('ciclo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>

                <div class="col-2">Dia:
                    <select required class="form-control @error('dia') is-invalid @enderror" name="dia" id="dia" value="{{ old('dia') }}">
                        <option value="">Elige Día-</option>
                        <option value="Lunes">Lunes</option>
                        <option value="Martes">Martes</option>
                        <option value="Miercoles">Miercoles</option>
                        <option value="Jueves">Jueves</option>
                        <option value="Viernes">Viernes</option>
                        <option value="Sabado">Sabado</option>
                        <option value="Domingo">Domingo</option>
                    </select>
                      @error('dia')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror                                    
                </div>

                <div class="col-2">Horas Disponibles:
                    <select required class="form-control @error('horas') is-invalid @enderror" name="horas" id="horas" value="{{ old('horas') }}">
                        <option value="">Elige Hora-</option>                        
                        @foreach($horas as $obj)
                            <option value="{{$obj->id}}">
                                {{$obj->hora_inicio." - ".$obj->hora_fin}}
                            </option>
                        @endforeach
                    </select>
                      @error('horas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>    

                <div class="col-3">Materia:
                    <select required class="form-control @error('materia') is-invalid @enderror" name="materia" id="materia" value="{{ old('materia') }}">
                        <option value="">Elige Materia-</option>
                        @foreach($materias as $obj)
                            <option value="{{$obj->id}}">{{$obj->nombre}}</option>
                        @endforeach
                    </select>
                      @error('materia')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror  
                </div>

                <input type="hidden" name="laboratorio" id="laboratorio" value="10">

            </div>
            <div class="row mt-4">
                <div class="col-5">
                    <input type="submit" class="btn btn-info" value="Guardar">
                </div>
            </div>
            </form>
            {!!Form::close()!!}
            <hr>
            <button class="btn btn-success d-flex align-items-end" id="btnMasiva">
                Registro Horarios con Excel <span class="material-icons m-0 p-0"> cloud_upload </span>
            </button>
        </div>
    </div>
    @include('sweet::alert')
    @endif





















    
   
    <!-- Registro horarios Importacion -->    
    <div class="card toggle-card mt-5 border" id="cardMasiva">
        <h5 class="card-header bg-light"> Registro con Importación</h5>
        <div class="card-body">
            <div class="row ">
                <div class="col-3 ">
                    <button type="button" class="btn btn-outline-secondary">
                        Descarga de plantilla
                        <svg width="1em" height="1em" viewBox="0 0 16 16"
                            class="bi bi-file-earmark-arrow-down-fill" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7 2l.5-2.5 3 3L10 5a1 1 0 0 1-1-1zm-.5 3.5a.5.5 0 0 0-1 0v3.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 11.293V7.5z" />
                        </svg>
                        <div style='text-align:center;'><i class="fa "></i></div>
                    </button>
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" name="" placeholder="01-2021">
                </div>
                <div class="col-3 ">
                    <button type="button" class="btn btn-outline-secondary">
                        Seleccionar Archivo
                    </button>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-5">
                    <input type="button" class="btn btn-info" value="Guardar">
                    <input type="button" class="btn btn-danger ml-2" id="btnCancelMasiva"
                    value="Cancelar">
                </div>
            </div>
        </div>
    </div>














    <!-- Editar horarios -->
    @if(empty($horariosEdit))
    @else
        <br>
        <div class="card" id="cardUserEdit">
            <h5 class="card-header bg-light">  Editar Horario</h5>
            <div class="card-body">
                {!!Form::model($horariosEdit,['method'=>'PATCH','route'=>['horario.update',$horariosEdit->id]])!!}
                {{Form::token()}}
                <form>
                    <div class="row ">

                        <div class="col-2">Ciclo:
                            <select class="form-control @error('ciclo') is-invalid @enderror" name="ciclo" id="ciclo" value="{{ old('ciclo') }}">
                                @foreach($ciclos as $obj)
                                    @if($obj->id == $horariosEdit->ciclo_id)
                                        <option value="{{$obj->id}}" selected>
                                            {{$obj->año."-0".$obj->nciclo}}
                                        </option>
                                    @else
                                        <option value="{{$obj->id}}">
                                            {{$obj->año."-0".$obj->nciclo}}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                              @error('ciclo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                        </div>

                        <div class="col-2">Dia:
                            <select class="form-control @error('dia') is-invalid @enderror" name="dia" id="dia" value="{{ old('dia') }}">
                                @if($horariosEdit->dia == 'Lunes') <option value="{{$horariosEdit->dia}}" selected>{{$horariosEdit->dia}}</option>
                                @else
                                <option value="Lunes">Lunes</option>
                                @endif
                                @if($horariosEdit->dia == 'Martes') <option value="{{$horariosEdit->dia}}" selected>{{$horariosEdit->dia}}</option>
                                @else
                                <option value="Martes">Martes</option>
                                @endif
                                @if($horariosEdit->dia == 'Miercoles') <option value="{{$horariosEdit->dia}}" selected>{{$horariosEdit->dia}}</option>
                                @else
                                <option value="Miercoles">Miercoles</option>
                                @endif
                                @if($horariosEdit->dia == 'Jueves') <option value="{{$horariosEdit->dia}}" selected>{{$horariosEdit->dia}}</option>
                                @else
                                <option value="Jueves">Jueves</option>
                                @endif
                                @if($horariosEdit->dia == 'Viernes') <option value="{{$horariosEdit->dia}}" selected>{{$horariosEdit->dia}}</option>
                                @else
                                <option value="Viernes">Viernes</option>
                                @endif
                                @if($horariosEdit->dia == 'Sabado') <option value="{{$horariosEdit->dia}}" selected>{{$horariosEdit->dia}}</option>
                                @else
                                <option value="Sabado">Sabado</option>
                                @endif
                                @if($horariosEdit->dia == 'Domingo') <option value="{{$horariosEdit->dia}}" selected>{{$horariosEdit->dia}}</option>
                                @else
                                <option value="Domingo">Domingo</option>
                                @endif
                            </select>
                              @error('dia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror                                    
                        </div>

                        <div class="col-2">Horas Disponibles:
                            <select class="form-control @error('horas') is-invalid @enderror" name="horas" id="horas" value="{{ old('horas') }}">
                                @foreach($horas as $obj)
                                    @if($obj->id == $horariosEdit->hora_id)
                                    <option value="{{$obj->id}}" selected>{{$obj->hora_inicio." - ".$obj->hora_fin}}</option>
                                    @else
                                    <option value="{{$obj->id}}">
                                        {{$obj->hora_inicio." - ".$obj->hora_fin}}
                                    </option>
                                    @endif
                                @endforeach
                            </select>
                              @error('horas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                        </div>    

                        <div class="col-3">Materia:
                            <select class="form-control @error('materia') is-invalid @enderror" name="materia" id="materia" value="{{ old('materia') }}">
                                @foreach($materias as $obj)
                                    @if($obj->id == $horariosEdit->materia_id)
                                        <option value="{{$obj->id}}" selected>{{$obj->nombre}}</option>
                                    @else
                                        <option value="{{$obj->id}}">{{$obj->nombre}}</option>
                                    @endif
                                @endforeach
                            </select>
                              @error('materia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror  
                        </div>

                        <div class="col-3">Alerta Seminario:
                            <input class="form-control" name="alerta_seminarios" type="text" value="{{$horariosEdit->alerta_seminarios}}" onblur="this.value = this.value.toUpperCase();">
                        </div>

                        <input type="hidden" name="laboratorio" id="laboratorio" value="10">
                         <input type="hidden" name="estado" id="estado" value="{{$horariosEdit->estado}}">

                    </div>
                    <div class="row mt-4">
                        <div class="col-5">
                            <input type="submit" class="btn btn-info" value="Guardar">
                            <a type="button" class="btn btn-danger ml-2" href="{{ url('/catalogo/horario') }}"
                            >Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endif











    <!-- Listado Horarios -->
    <br>
    <div class="card">
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-2">
                <span class="badge badge-info">&nbsp &nbsp &nbsp &nbsp &nbsp</span> &nbsp Practica Libre
            </div>
            <div class="col-3">
                <span class="badge badge-danger">&nbsp &nbsp &nbsp &nbsp &nbsp</span> &nbsp Alerta
                Seminarios
            </div>
        </div>
        <h4 class="mt-4 text-center">HORARIOS ESTABLECIDOS PARA EL CICLO 01-2021</h4>
        <div class="row d-flex align-items-end">
            <div class="col-2">
                <h5 class="mt-4">Filtros:</h5>
            </div>
            <div class="col-1 mb-1 text-secondary">
                <span class="material-icons">filter_alt</span>
            </div>
        </div>
        <div class="row ">
            <div class="col-3">
                <select class="form-control" name="" id="">
                    <option value="">Seleccionar Edificio</option>
                </select>
            </div>
            <div class="col-3">
                <select class="form-control" name="" id="">
                    <option value="">Seleccionar Dia</option>
                </select>
            </div>
            <div class="col-3">
                <select class="form-control" name="" id="">
                    <option value="">Seleccionar Horario</option>
                </select>
            </div>
            <div class="col-3">
                <input type="text" class="form-control" name="" placeholder="Software">
            </div>
        </div>
        </a>
        <hr>
        <table class="table table-sm text-center my-5">
            <thead class="text-light">
                <th>#</th>
                <th>Laboratorio</th>
                <th>Ciclo</th>
                <th>Dia</th>
                <th>Horario</th>
                <th>Materia</th>
                <th>Seminarios</th>
                <th>Acciones</th>
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
                    <td align="center">
                        <a href="{{URL::action('catalogo\HorarioControler@edit',$horario->id)}}"
                            class="on-default edit-row"><i class="fa fa-pencil fa-lg"></i>
                        </a>
                        &nbsp;&nbsp;
                            <a href="" data-target="#modal-delete-{{$horario->id}}" data-toggle="modal"><i
                            class="fa fa-trash fa-lg"></i></a>
                    </td>
                    <td></td>
                </tr>
                @include('catalogo.horario.modal')
            @endif
            @endforeach
            </tbody>
        </table>
    </div>
    



    <!-- fin del main -->

















    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

   <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });
        });
            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
                $('.navbar').addClass('fixed-top');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                $('.navbar').removeClass('fixed-top');
            });
            $('#btnAgregar').click( function(){
                $('#cardRegistrar').toggle('slow');
            });
            $('#btnModificarUser').click( function(){
                $('#cardUserEdit').toggle('slow');
            });
            $('#btnMasiva').click( function(){
                $('#cardMasiva').toggle('slow');
            });
            $('#btnCancelReg').click( function(){
                $('#cardRegistrar').toggle('slow');
            });
            $('#btnCancelEdit').click( function(){
                $('#cardUserEdit').toggle('slow');
            });
            $('#btnCancelMasiva').click( function(){
                $('#cardMasiva').toggle('slow');
            });
    </script>





@endsection