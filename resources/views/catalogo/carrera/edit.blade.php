@extends ('sidebar.superadmin')
@section ('contenido')
<script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>

<div class="x_panel">
    <div class="clearfix"></div>
    <div class="row">
        <div class="x_title">
            <h2>Modificación de carrera</h2>

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

            {!!Form::model($carrera,['method'=>'PATCH','route'=>['carrera.update',$carrera->id]])!!}
            {{Form::token()}}

            <form class="form-horizontal">
                <br>

                <div class="form-group row">
                    <label class="control-label col-md-3" align="right">Nombre</label>
                    <div class="col-md-6">
                        <input class="form-control" name="nombre" type="text" value="{{$carrera->nombre}}" onblur="this.value = this.value.toUpperCase();">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-md-3" align="right">Facultad</label>
                    <div class="col-md-6">
                        <select class="form-control" name="facultad">
                            @foreach($facultades as $obj)
                            @if($obj->id == $carrera->facultad)
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
                    <a href="{{url('catalogo/carrera')}}"><button type="button" class="btn btn-primary">Cancelar</button></a>
                </div>

            </form>

            {!!Form::close()!!}


            <form action="../../carrera/add_materia" method="POST">
                {{Form::token()}}

                <div class="col-md-3 col-sm-12 col-xs-12"></div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <input type="hidden" name="id" value="{{$carrera->id}}">
                    <select name="materias" class="form-control">
                        @foreach ($materias as $obj)
                        <option value="{{$obj->id}}">{{$obj->nombre}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <input type="submit" value="Agregar materia" class="btn btn-primary">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    &nbsp;
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12"></div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead class="text-light">
                            <th>id</th>
                            <th>Nombre</th>
                        </thead>
                        <tbody>
                            @foreach ($materias_carrera as $obj)
                            <tr>
                                <td align="center">{{ $obj->id}}</td>
                                <td>{{ $obj->nombre}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>



            </form>



        </div>
        @include('sweet::alert')
    </div>
</div>
@endsection