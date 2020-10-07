@extends ('sidebar.superadmin')
@section ('contenido')
<script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>

<div class="x_panel">
    <div class="clearfix"></div>
    <div class="row">
        <div class="x_title">
            <h2>Modificación de Practica</h2>

            <ul class="nav navbar-right panel_toolbox">

            </ul>
            <div class="clearfix"></div>
        </div>
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

            {!!Form::model($practica,['method'=>'PATCH','route'=>['practica.update',$practica->id]])!!}
            {{Form::token()}}

            <form class="form-horizontal">
                <br>

                <div class="form-group row">
                    <label class="control-label col-md-3" align="right">Fecha</label>
                    <div class="col-md-6">
                        <input class="form-control" name="fecha" type="date" value="{{$practica->fecha}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-md-3" align="right">Asistencia</label>
                    <div class="col-md-6">
                        <input class="form-control" name="asistencia" id="asistencia" type="number" value="{{$practica->asistencia}}">
                    </div>
                </div>



                <div class="form-group row">
                    <label class="control-label col-md-3" align="right">Carrera</label>
                    <div class="col-md-6">

                        <select name="carrera" class="form-control">
                            @foreach ($carrera as $obj)
                            @if($obj->id == $practica->id_carreras)
                            <option value="{{$obj->id}}" selected>{{$obj->nombre}}</option>
                            @else
                            <option value="{{$obj->id}}">{{$obj->nombre}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group" align="center">
                    <button class="btn btn-success" type="submit">Guardar</button>
                    <a href="{{url('catalogo/practica')}}"><button type="button" class="btn btn-primary">Cancelar</button></a>
                </div>

            </form>

            {!!Form::close()!!}





        </div>
        @include('sweet::alert')
    </div>
</div>
@endsection