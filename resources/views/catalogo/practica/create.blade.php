@extends ('sidebar.superadmin')
@section ('TituloVista' , 'Nueva Practica')
@section ('contenido')
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
                    <div class="form-group row">
                        <label class="control-label col-md-3" align="right">Fecha</label>
                        <div class="col-md-6">
                            <input class="form-control" name="fecha" type="date" autofocus="true"
                                onblur="this.value = this.value.toUpperCase();">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3" align="right">Asistencia</label>
                        <div class="col-md-6">
                            <input class="form-control" name="asistencia" type="number" autofocus="true"
                                onblur="this.value = this.value.toUpperCase();">
                        </div>
                    </div>

                    

                    <div class="form-group row">
                        <label class="control-label col-md-3" align="right">cARRERA</label>
                        <div class="col-md-6">
                            <select class="form-control" name="id_carreras">
                                @foreach($carreras as $obj)
                                    <option value="{{$obj->id}}">{{$obj->nombre}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                    </div>

                  

                    <div class="form-group" align="center">
                        <button type="submit" class="btn btn-success">Aceptar</button>
                        <a href="{{url('catalogo/practica')}}"><button type="button"
                                class="btn btn-primary">Cancelar</button></a>
                    </div>

                </form>
                {!!Form::close()!!}


            </div>
            @include('sweet::alert')
        </div>
    </div>
</div>
@endsection