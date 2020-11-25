@extends ('layouts.app')
@section ('h2',"Editar Practica")
@section ('content')
<script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>
<div class="x_panel">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-horizontal form-label-left">
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="x_content">
                <br />

                {!!Form::model($practica,['method'=>'PATCH','route'=>['practica.update',$practica->id]])!!}
                {{Form::token()}}
                <form class="form-horizontal">
                    <br>
                    <input type="hidden" name="laboratorio" id="laboratorio" value="{{$lab}}">
                    <div class="form-group row">
                        <label class="control-label col-md-3" align="right">Fecha</label>
                        <div class="col-md-6">
                        <input class="form-control" name="fecha" type="date" value="{{$practica->fecha}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3" align="right">Dia:</label>
                        <div class="col-md-6">
                            <select class="form-control" id="dia" name="dia">
                                @switch($practica->horario->dia)
                                    @case('Lunes')
                                        <option value="Lunes" selected>Lunes</option>
                                        <option value="Martes">Martes</option>
                                        <option value="Miercoles">Miercoles</option>
                                        <option value="Jueves">Jueves</option>
                                        <option value="Viernes">Viernes</option>
                                        <option value="Sabado">Sabado</option>
                                        <option value="Domingo">Domingo</option>
                                        @break
                                    @case('Martes')
                                        <option value="Lunes">Lunes</option>
                                        <option value="Martes" selected>Martes</option>
                                        <option value="Miercoles">Miercoles</option>
                                        <option value="Jueves">Jueves</option>
                                        <option value="Viernes">Viernes</option>
                                        <option value="Sabado">Sabado</option>
                                        <option value="Domingo">Domingo</option>
                                        @break
                                    @case('Miercoles')
                                        <option value="Lunes">Lunes</option>
                                        <option value="Martes" >Martes</option>
                                        <option value="Miercoles" selected>Miercoles</option>
                                        <option value="Jueves">Jueves</option>
                                        <option value="Viernes">Viernes</option>
                                        <option value="Sabado">Sabado</option>
                                        <option value="Domingo">Domingo</option>
                                        @break
                                    @case('Jueves')
                                        <option value="Lunes">Lunes</option>
                                        <option value="Martes">Martes</option>
                                        <option value="Miercoles">Miercoles</option>
                                        <option value="Jueves" selected>Jueves</option>
                                        <option value="Viernes">Viernes</option>
                                        <option value="Sabado">Sabado</option>
                                        <option value="Domingo">Domingo</option>
                                        @break
                                    @case('Viernes')
                                        <option value="Lunes">Lunes</option>
                                        <option value="Martes">Martes</option>
                                        <option value="Miercoles">Miercoles</option>
                                        <option value="Jueves">Jueves</option>
                                        <option value="Viernes" selected>Viernes</option>
                                        <option value="Sabado">Sabado</option>
                                        <option value="Domingo">Domingo</option>
                                        @break
                                    @case('Sabado')
                                        <option value="Lunes">Lunes</option>
                                        <option value="Martes">Martes</option>
                                        <option value="Miercoles">Miercoles</option>
                                        <option value="Jueves">Jueves</option>
                                        <option value="Viernes">Viernes</option>
                                        <option value="Sabado" selected>Sabado</option>
                                        <option value="Domingo">Domingo</option>
                                        @break
                                    @case('Domingo')
                                        <option value="Lunes">Lunes</option>
                                        <option value="Martes">Martes</option>
                                        <option value="Miercoles">Miercoles</option>
                                        <option value="Jueves">Jueves</option>
                                        <option value="Viernes">Viernes</option>
                                        <option value="Sabado">Sabado</option>
                                        <option value="Domingo" selected>Domingo</option>
                                        @break
                                @endswitch
                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3" align="right">horario clase</label>
                        <div class="col-md-6">
                            <select class="form-control" id="id_horas_clase" name="id_horarios">
                                @foreach($horarios as $horario)
                                    @if($horario->id == $practica->horario_id)
                                    <option value="{{$horario->id}}" selected>{{$horario->hora->horario}}</option>
                                    @else
                                    <option value="{{$horario->id}}">{{$horario->hora->horario}}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3" align="right">Asistencia</label>
                        <div class="col-md-6">
                            <input class="form-control" name="asistencia" type="number" autofocus="true" value="{{$practica->asistencia}}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="control-label col-md-3" align="right">CARRERA</label>
                        <div class="col-md-6">
                            <select class="form-control" name="id_carreras">
                                @foreach($carreras as $carrera)
                                    @if($carrera->id == $practica->carrera_id)
                                        <option value="{{$carrera->id}}" selected>{{$carrera->nombre.$carrera->id}}</option>
                                    @else
                                        <option value="{{$carrera->id}}">{{$carrera->nombre}}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="form-group" align="center">
                        <button type="submit" class="btn btn-success">Aceptar</button>
                        <a href="{{url('practicas',$lab)}}"><button type="button" class="btn btn-primary">Cancelar</button></a>
                    </div>

                </form>
                {!!Form::close()!!}


            </div>
            @include('sweet::alert')
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('js/jquery.min.js')}}"></script>



    <script type="text/javascript">
        $(document).ready(function() {
            //combo para Horarios
            $("#dia").change(function() {
                // var para la Horarios                            
                var dia = $(this).val();
                var laboratorio = $('#laboratorio').val();
                //console.log(dia+" "+laboratorio);

                //funcionpara las municipios
                $.get('../../../catalogo/horarios/' + laboratorio +'/'+ dia , function(data) {
                    //esta el la peticion get, la cual se divide en tres partes. ruta,variables y funcion
                    console.log(data);
                    var _select = '';
                    for (var i = 0; i < data.length; i++)
                    {
                        _select += '<option value="' + data[i].id + '">' + data[i].hora.horario + '</option>';
                    }
                    if (_select == '') {
                        var _select = '<option value="">No hay practicas libres</option>';
                    }

                    $("#id_horas_clase").html(_select);

                });

            });
        });
    </script>
</div>
@endsection