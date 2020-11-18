@extends ('layouts.app')
@section ('h2',"Usuarios")
@section ('content')
<script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>




<!-- Fin del Titulo -->
<!-- Inicio del main -->

<div class="row my-5">
    <a href="{{url('catalogo/user/create')}}">
        <button class="btn btn-dark ml-auto d-flex align-items-end" id="btnAgregarUser">
            Agregar Nuevo Usuario <span class="material-icons m-0 p-0"> add_circle_outline </span>
        </button>
    </a>

    <table id="datatable" class="table table-striped table-bordered">
        <thead class="text-light">
            <th>id</th>
            <th>Nombre</th>
            <th>email</th>
            <th>estatus</th>
            <th>rol</th>
            <th colspan="3">Acciones</th>
        </thead>
        <tbody>

            @foreach ($usuarios as $usuario)
            <tr>
                <td align="center">{{ $usuario->id}}</td>
                <td>{{ $usuario->nombres." ".$usuario->apellidos}}</td>
                <td>{{ $usuario->email}}</td>
                <td>{{ $usuario->estatus}}</td>
                <td>
                    @foreach($usuario->usersRoles as $rol)
                        {{ $rol->name}}
                    @endforeach
                </td>

                <td align="center">
                    <a href="{{URL::action('catalogo\UserController@show',$usuario->id)}}"
                        class="on-default edit-row"><i class="fa fa-eye fa-lg"></i></a>
                    &nbsp;&nbsp;
                    <a href="{{URL::action('catalogo\UserController@edit',$usuario->id)}}"
                        class="on-default edit-row"><i class="fa fa-pencil fa-lg"></i></a>
                    &nbsp;&nbsp;
                    <a href="" data-target="#modal-delete-{{$usuario->id}}" data-toggle="modal"><i
                            class="fa fa-trash fa-lg"></i></a>
                </td>
            </tr>
            @include('catalogo.user.modal')
            @endforeach



        </tbody>
    </table>
    @include('sweet::alert')
</div>
<!-- fin del main -->



@endsection