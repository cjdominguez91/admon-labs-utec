@extends ('layouts.app')
@section ('h2',"Laboratorios")
@section ('content')
<script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>
<!-- Fin del Titulo -->
<!-- Inicio del main -->

<div class="row my-5">
    <a href="{{url('catalogo/laboratorio/create')}}">
        <button class="btn btn-dark ml-auto d-flex align-items-end" id="btnAgregarUser">
            Agregar Nuevo Laboratorio <span class="material-icons m-0 p-0"> add_circle_outline </span>
        </button>
    </a>

    <table id="datatable" class="table table-striped table-bordered">
        <thead class="text-light">
            <th>id</th>
            <th>Nombre</th>
            <th>Ubicacion</th>
            <th>Encargado</th>
            <th colspan="3">Acciones</th>
        </thead>
        <tbody>

            @foreach ($laboratorios as $obj)
            <tr>
                <td align="center">{{ $obj->id}}</td>
                <td>{{ $obj->nombre}}</td>
                <td>{{ $obj->ubicacion}}</td>
                <td>{{ $obj->user->nombres." ".$obj->user->apellidos}}</td>
                <td align="center">
                    <a href="{{URL::action('catalogo\LaboratorioController@show',$obj->id)}}"
                        ><i class="fa fa-eye fa-lg"></i></a>
                    &nbsp;&nbsp;
                    <a href="{{URL::action('catalogo\LaboratorioController@edit',$obj->id)}}"
                        class="on-default edit-row"><i class="fa fa-pencil fa-lg"></i></a>
                    &nbsp;&nbsp;
                    <a href="" data-target="#modal-delete-{{$obj->id}}" data-toggle="modal"><i
                            class="fa fa-trash fa-lg"></i></a>
                </td>
            </tr>
            @include('catalogo.laboratorio.modal')
            @endforeach



        </tbody>
    </table>
    @include('sweet::alert')
</div>
<!-- fin del main -->



@endsection