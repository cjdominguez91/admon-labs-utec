
@extends ('sidebar.superadmin')
@section ('TituloVista', 'Información de Laboratorio')
@section ('contenido')
<script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>

 




               <!-- Inicio del main -->
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

                &nbsp &nbsp &nbsp &nbsp

                <div>

                    <div class="card">
                        <h5 class="card-header bg-light"> Registro de Horarios</h5>
                        <div class="card-body">
                            {!!Form::open(array('url'=>'catalogo/horario','method'=>'POST','autocomplete'=>'off'))!!}
                            {{Form::token()}}
                            <form>
                            <div class="row ">



                                <div class="col-2">
                                      <input id="inicio" type="text" class="form-control @error('inicio') is-invalid @enderror" placeholder="Hora Inicio" name="inicio" value="{{ old('inicio') }}" required autocomplete="inicio" autofocus>
                                      @error('inicio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                </div>
                                <div class="col-2">
                                      <input id="final" type="text" class="form-control @error('final') is-invalid @enderror" placeholder="Hora Final" name="final" value="{{ old('final') }}" required autocomplete="final" autofocus>
                                      @error('final')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                </div>

                                <div class="col-2">
                                      <input id="ciclo" type="text" class="form-control @error('ciclo') is-invalid @enderror" placeholder="Ciclo" name="ciclo" value="{{ old('ciclo') }}" required autocomplete="ciclo" autofocus>
                                      @error('ciclo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                </div>

                                <div class="col-2">
                                    <select class="form-control @error('dia') is-invalid @enderror" name="dia" id="dia" value="{{ old('dia') }}">
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
                                <div class="col-3">
                                    <select class="form-control @error('materia') is-invalid @enderror" name="materia" id="materia" value="{{ old('materia') }}">
                                        <option value="DSIWI">DSIWI</option>
                                        <option value="DSIWII">DSIWII</option>
                                    </select>
                                      @error('materia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror  
                                </div>

                            </div>

                            <div class="row mt-4">
                                <div class="col-5">
                                    <input type="submit" class="btn btn-info" value="Guardar">
                                    <input type="button" class="btn btn-danger ml-2" id="btnCancelRegUser"
                                        value="Cancelar">
                                </div>
                            </div>
                            </form>
                            {!!Form::close()!!}
                        </div>
                    </div>

                    &nbsp &nbsp &nbsp &nbsp
                    &nbsp &nbsp &nbsp &nbsp
                    &nbsp &nbsp &nbsp &nbsp
                    &nbsp &nbsp &nbsp &nbsp

                    &nbsp &nbsp &nbsp &nbsp
                </div>
                

                <div class="card">
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
                                <input type="button" class="btn btn-danger ml-2" id="btnCancelRegUser"
                                    value="Cancelar">
                            </div>
                        </div>

                    </div>
                </div>



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
                <table class="table table-sm text-center my-5">
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
                        <tr>
                            <td>{{$horario->id}}</td>
                            <td>{{$horario['id_laboratorio']}}</td>
                            <td>{{$horario['ciclo']}}</td>
                            <td>{{$horario['dia']}}</td>
                            <td>{{$horario['inicio']. " - " .$horario['final'] }}</td>
                            <td>{{$horario['id_materia']}}</td>
                            <td>{{$horario['alerta_seminario']}}</td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                &nbsp &nbsp &nbsp &nbsp
                &nbsp &nbsp &nbsp &nbsp
                &nbsp &nbsp &nbsp &nbsp




                <div>

                    <div class="card">
                        <h5 class="card-header bg-light">  Editar Horario</h5>
                        <div class="card-body">

                            <div class="row ">



                                <div class="col-2">
                                    <input type="text" class="form-control" name="" placeholder="6:00 am - 8:00 am">
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" name="" placeholder="01-2021">
                                </div>
    
                                <div class="col-2">
                                    <select class="form-control" name="" id="">
                                        <option value="">Lunes</option>
                                        <option value="">Martes</option>
                                        <option value="">Miercoles</option>
                                        <option value="">Jueves</option>
                                        <option value="">Viernes</option>
                                        <option value="">Sabado</option>
                                        <option value="">Domingo</option>
    
                                    </select>
                                </div>
                                <div class="col-3">
                                    <select class="form-control" name="" id="">
                                        <option value="">Practica Libre</option>
                                        <option value="">Seminario</option>
                                    </select>
                                </div>



                            </div>
                            <div class="row mt-4">
                                <div class="col-5">
                                    <input type="button" class="btn btn-info" value="Guardar">
                                    <input type="button" class="btn btn-danger ml-2" id="btnCancelRegUser"
                                        value="Cancelar">
                                </div>
                            </div>

                        </div>
                    </div>













            &nbsp &nbsp &nbsp &nbsp
            <h5 class="card-body bg-light">

                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-6">
                        <div class="card py-4 px-5">
                            <div class="card-body">
                                <span class="text-center soft-tittle bg-dark">Software Disponible</span>
                                <p class="text-justify mt-5 text-dark">SQL Server, Oracle SQL Developer, SQL
                                    YOG,
                                    XAMMP,
                                    NetBeans, Visual Studio, Sublime Text, Photoshop, Adobe Ilustrator</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-3 ">
                    <button type="button" class="btn btn-outline-secondary">
                        Guardar

                    </button>
                </div>


            </h5>

        </div>

        <!-- fin del main -->









@endsection