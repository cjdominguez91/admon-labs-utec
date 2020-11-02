@extends ('layouts.app')
@section ('h2',"Permisos")
@section ('content')
<script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>
<!-- Fin del Titulo -->
<!-- Inicio del main -->

<div class="row my-5">
    <a href="{{url('catalogo/permission/create')}}">
        <button class="btn btn-dark ml-auto d-flex align-items-end" id="btnAgregarUser">
            Agregar Nuevo Permiso <span class="material-icons m-0 p-0"> add_circle_outline </span>
        </button>
    </a>

    <table id="datatable" class="table table-striped table-bordered text-center">
        <thead class="text-light">
            <th>id</th>
            <th>Permisos</th>
            <th colspan="3">Acciones</th>
        </thead>
        <tbody>

            @foreach ($permissions as $permission)
            <tr>
                <td align="center">{{ $permission->id}}</td>
                <td>{{ $permission->name}}</td>
                <td align="center">
                    &nbsp;&nbsp;
                    <a href="{{URL::action('catalogo\PermissionController@edit',$permission->id)}}"
                        class="on-default edit-row"><i class="fa fa-pencil fa-lg"></i></a>
                    &nbsp;&nbsp;
                    <a href="" data-target="#modal-delete-{{$permission->id}}" data-toggle="modal"><i
                            class="fa fa-trash fa-lg"></i></a>
                </td>
            </tr>
            @include('catalogo.permission.modal')
            @endforeach



        </tbody>
    </table>
    @include('sweet::alert')
</div>
<!-- fin del main -->



@endsection