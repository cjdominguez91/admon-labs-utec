@extends ('layouts.app')
@section ('h2',"Ciclos")
@section ('content')
<script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>
<!-- Fin del Titulo -->
<!-- Inicio del main -->

<div class="row my-5">
    <a href="{{url('catalogo/ciclo/create')}}">
        <button class="btn btn-dark ml-auto d-flex align-items-end" id="btnAgregarUser">
            Agregar Nuevo Ciclo <span class="material-icons m-0 p-0"> add_circle_outline </span>
        </button>
    </a>

    <table id="datatable" class="table table-striped table-bordered text-center">
        <thead class="text-light">
            <th>id</th>
            <th>Año</th>
            <th>Ciclo</th>
            <th>Codigo</th>
            <th>Estado</th>
            <th colspan="3">Acciones</th>
            <th>Current</th>
        </thead>
        <tbody>
            @foreach ($ciclos as $ciclo)
            <tr>
                <td align="center">{{ $ciclo->id}}</td>
                <td>{{ $ciclo->año}}</td>
                <td>{{ $ciclo->nciclo}}</td>
                <td>{{ $ciclo->codigo}}</td>
                <td>{{ $ciclo->estatus}}</td>
                <td colspan="3" align="center">
                    <a href="{{URL::action('catalogo\CicloController@edit',$ciclo->id)}}"
                        class="on-default edit-row"><i class="fa fa-pencil fa-lg"></i></a>
                    &nbsp;&nbsp;
                    <a href="" data-target="#modal-delete-{{$ciclo->id}}" data-toggle="modal"><i
                            class="fa fa-trash fa-lg"></i></a>
                </td>
                <td>
                    <div class="form-check text-center">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    </div>
                </td>
            </tr>
            @include('catalogo.ciclo.modal')
            @endforeach



        </tbody>
    </table>
    @include('sweet::alert')
</div>
<!-- fin del main -->



@endsection