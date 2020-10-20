@extends ('sidebar.superadmin')
@section ('TituloVista' , 'Información de Laboratorio')
@section ('contenido')
        <div class="row mt-5">
                    <div class="col-md-4 col-sm-12 text-center ml-5">
                        <img src="../img/card.png" alt="" width="317" height="180">
                    </div>
                    <div class="col-md-5 col-sm-12 ml-4">
                        <table>
                            <th colspan="2"><h5><span class="badge badge-dark p-1">{{$laboratorio->nombre}}</span></h5></th>
                            <tr><td><b>Ubicación:</b> <span>{{$laboratorio->ubicacion}}</span></td></tr>
                            <tr><td><b>Equipos Disponibles:</b> <span>{{$laboratorio->cant_equipo}}</span></td></tr>
                            <tr><td><b>Encargado:</b> <span>{{$laboratorio->user->nombres." ".$laboratorio->user->apellidos}}</span></td></tr>
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
                        <tr>
                            <td>1</td>
                            <td>Laboratorio 2</td>
                            <td>01-2021</td>
                            <td>Lunes</td>
                            <td>6:00 a.m. - 8:20 p.m.</td>
                            <td>BD2</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Laboratorio 2</td>
                            <td>01-2021</td>
                            <td>Lunes</td>
                            <td>6:00 a.m. - 8:20 p.m.</td>
                            <td>BD2</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Laboratorio 2</td>
                            <td>01-2021</td>
                            <td>Lunes</td>
                            <td>6:00 a.m. - 8:20 p.m.</td>
                            <td><span class="badge badge-info">Practica Libre</span></td>
                            <td><span class="badge badge-danger">Seminario 22 de septiembre</span></td>
                        </tr>
                    </tbody>
                </table>

                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-md-6 col-sm-12">
                        <div class="card py-4 px-5">
                            <div class="card-body">
                                <span class="text-center soft-tittle bg-dark">Software Disponible</span>
                                <p class="text-justify mt-5 text-dark">SQL Server, Oracle SQL Developer, SQL YOG, XAMMP, NetBeans, Visual Studio, Sublime Text, Photoshop, Adobe Ilustrator</p>
                            </div>
                        </div> 
                    </div>
                    
                </div>

@endsection