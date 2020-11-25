@extends ('layouts.app')
@section ('h2',"Nueva Practica Libre")
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

                {!!Form::open(array('url'=>'catalogo/practica','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}
                <form class="form-horizontal">
                    <br>
                    <input type="hidden" name="laboratorio" id="laboratorio" value="{{$id}}">
                    <div class="form-group row">
                        <label class="control-label col-md-3" align="right">Fecha</label>
                        <div class="col-md-6">
                            <input class="form-control" name="fecha" type="date" autofocus="true" onblur="this.value = this.value.toUpperCase();">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3" align="right">Dia:</label>
                        <div class="col-md-6">
                            <select class="form-control" id="dia" name="dia">
                                <option value="">Elige Día-</option>
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miercoles">Miercoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                <option value="Sabado">Sabado</option>
                                <option value="Domingo">Domingo</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3" align="right">horario clase</label>
                        <div class="col-md-6">
                            <select class="form-control" id="id_horas_clase" name="id_horarios">

                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3" align="right">Asistencia</label>
                        <div class="col-md-6">
                            <input class="form-control" name="asistencia" type="number" autofocus="true" onblur="this.value = this.value.toUpperCase();">
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="control-label col-md-3" align="right">CARRERA</label>
                        <div class="col-md-6">
                            <select class="form-control" name="id_carreras">
                                @foreach($carreras as $carrera)
                                    <option value="{{$carrera->id}}">{{$carrera->nombre}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="form-group" align="center">
                        <button type="submit" class="btn btn-success">Aceptar</button>
                        <a href="{{url('practicas',$id)}}"><button type="button" class="btn btn-primary">Cancelar</button></a>
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
                $.get('../catalogo/horarios/' + laboratorio +'/'+ dia , function(data) {
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