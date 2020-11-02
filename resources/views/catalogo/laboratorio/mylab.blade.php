@extends ('layouts.app')
@section ('h2',"Mi Laboratorio")
@section ('content')
<script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>
<!-- Fin del Titulo -->
<!-- Inicio del main -->

<div class="row my-5">

    <table id="datatable" class="table table-striped table-bordered text-center">
        <thead class="text-light">
            <th>#</th>
            <th>Nombre</th>
            <th>Encargado</th>
            <th colspan="3">Acciones</th>
        </thead>
        <tbody>
            <tr>    
                <td style="vertical-align: middle">1</td>
                <td style="vertical-align: middle">Laboratorio 1</td>
                <td style="vertical-align: middle">Juan Perez</td>
                <td align="center">
                    <a href="" class="btn btn-dark btn-sm mx-1">Horarios</a>
                    <a href="{{ url('catalogo/practica') }}" class="btn btn-secondary  btn-sm mx-1">Practicas</a>
                </td>
            </tr>   
        </tbody>
    </table>
    @include('sweet::alert')
</div>
<!-- fin del main -->



@endsection