@extends ('layouts.app')
@section ('h2',"Mis Laboratorios")
@section ('content')
<script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>
<!-- Fin del Titulo -->
<!-- Inicio del main -->

<div class="row my-5">

    <table id="datatable" class="table table-striped table-bordered text-center">
        <thead class="text-light">
            <th>#</th>
            <th>Nombre</th>
            <th colspan="3">Gestionar</th>
        </thead>
        <tbody>
            @foreach($laboratorios as $laboratorio)
            <tr>    
                <td style="vertical-align: middle">{{$laboratorio->id}}</td>
                <td style="vertical-align: middle">{{$laboratorio->nombre}}</td>
                <td align="center">
                    <a href="{{ route('custom', $laboratorio->id) }}" class="btn btn-dark btn-sm mx-1">Horarios</a>
                    <a href="{{ route('practicas', $laboratorio->id) }}" class="btn btn-secondary  btn-sm mx-1">Practicas</a>
                </td>
            </tr> 
            @endforeach
        </tbody>
    </table>
    @include('sweet::alert')
</div>
<!-- fin del main -->



@endsection