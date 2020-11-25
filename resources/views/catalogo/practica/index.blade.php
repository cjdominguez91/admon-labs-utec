@extends ('layouts.app')
@section ('h2',"Practicas Libres")
@section ('content')
<script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>


<!-- Fin del Titulo -->
<!-- Inicio del main -->

<div class="row my-5">
        <a href="{{route('practica',$id)}}">
            <button class="btn btn-dark ml-auto d-flex align-items-end" id="btnAgregarUser">
                Agregar Nueva Practica &nbsp <span class="material-icons m-0 p-0"> add_circle_outline </span>
            </button>
        </a>
    <table id="datatable" class="table table-striped table-bordered">
        <thead class="text-light">
            <th>id</th>
            <th>Laboratorio</th>
            <th>Ciclo</th>
            <th>dia</th>
            <th>Hora</th>    
            <th>fecha</th>
            <th>Carrera</th>
            <th>Asistencia</th>
            <th colspan="3">Acciones</th>
        </thead>
        <tbody>
                @foreach($horarios as $horario)
                    @foreach($horario->practicas as $practica)
                        <tr>
                            <td align="center">{{ $practica->id }}</td>
                            <td>{{ $horario->laboratorio->nombre }}</td>
                            <td>{{ $horario->ciclo->codigo }}</td>
                            <td>{{ $horario->dia }}</td>
                            <td>{{ $horario->hora->horario }}</td>
                            <td>{{ $practica->fecha }}</td>
                            <td>{{ $practica->carrera->nombre }}</td>
                            <td>{{ $practica->asistencia }}</td>
                            <td align="center">
                                <a href="{{route('practicas', $practica->id.'/'.$horario->laboratorio->id)}}"
                                    class="on-default edit-row"><i class="fa fa-pencil fa-lg"></i></a>
                                &nbsp;&nbsp;
                                <a href="" data-target="#modal-delete-{{$practica->id}}" data-toggle="modal"><i class="fa fa-trash fa-lg"></i></a>
                            </td>
                        </tr>
                        @include('catalogo.practica.modal')
                    @endforeach
                @endforeach
        </tbody>
    </table>
    @include('sweet::alert')
</div>
<!-- fin del main -->
@endsection