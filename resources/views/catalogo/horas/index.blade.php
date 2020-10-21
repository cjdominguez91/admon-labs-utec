@extends ('sidebar.superadmin')
@section ('contenido')
<script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>

<div class="row mt-5">
    <div class="col">
        <h2 class="m-0 p-0">Horas</h2>
    </div>
</div>
<hr>
<!-- Fin del Titulo -->
<!-- Inicio del main -->










    <!-- Registro horas -->
    @if(empty($horasEdit))
    <div class="card" id="cardRegistrar">
        <h5 class="card-header bg-light"> Registro de Horas</h5>
        <div class="card-body">
            {!!Form::open(array('url'=>'catalogo/horas','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
                <form class="form-horizontal">
                    <div class="row">
                        <div class="col-2">Hora Incial:
                            <input required class="form-control" name="hora_inicio" type="time" autofocus="true"
                                onblur="this.value = this.value.toUpperCase();">
                        </div>
                        <div class="col-2">Hora Final:
                            <input required class="form-control" name="hora_final" type="time" autofocus="true"
                                onblur="this.value = this.value.toUpperCase();">
                        </div>
                        <div class="col-2"><br>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                </form>
            {!!Form::close()!!}

        </div>
    </div>
    @include('sweet::alert')
    @endif














    <!-- Editar horas -->
    @if(empty($horasEdit))
    @else
        <br>
        <div class="card" id="cardUserEdit">
            <h5 class="card-header bg-light">  Editar Horas</h5>
            <div class="card-body">
                {!!Form::model($horasEdit,['method'=>'PATCH','route'=>['horas.update',$horasEdit->id]])!!}
                {{Form::token()}}
                <form class="form-horizontal">
                    <div class="row">
                        <div class="col-2">Hora Incial:
                            <input required class="form-control" name="hora_inicio" value="{{$horasEdit->hora_inicio}}" type="time" autofocus="true"
                                onblur="this.value = this.value.toUpperCase();">
                        </div>
                        <div class="col-2">Hora Final:
                            <input required class="form-control" name="hora_final" value="{{$horasEdit->hora_fin}}" type="time" autofocus="true"
                                onblur="this.value = this.value.toUpperCase();">
                        </div>
                        <input type="hidden" name="estado" id="estado" value="{{$horasEdit->estado}}">
                        <div class="col-2"><br>
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        </div>
                        <div class="col-2"><br>
                            <a type="button" class="btn btn-danger ml-2" href="{{ url('/catalogo/horas') }}"
                            >Cancelar</a>
                        </div>
                    </div>
                </form>
        </div></div>
    @endif













<div class="row my-5">
    <table id="datatable" class="table table-striped table-bordered">
        <thead class="text-light">
            <th>id</th>
            <th>Horas</th>
            <th colspan="2">Acciones</th>
        </thead>
        <tbody>

            @foreach ($horas as $obj)
            @if($obj->estado == 1)
            <tr>
                <td align="center">{{ $obj->id}}</td>
                <td>{{ $obj->hora_inicio ." - ". $obj->hora_fin}}</td>
                <td align="center">
                    <a href="{{URL::action('catalogo\HoraControler@edit',$obj->id)}}"
                        class="on-default edit-row"><i class="fa fa-pencil fa-lg"></i></a>
                    &nbsp;&nbsp;
                    <a href="" data-target="#modal-delete-{{$obj->id}}" data-toggle="modal"><i
                            class="fa fa-trash fa-lg"></i></a>
                </td>
            </tr>
            @include('catalogo.horas.modal')
            @endif
            @endforeach



        </tbody>
    </table>
    @include('sweet::alert')
</div>
<!-- fin del main -->



@endsection