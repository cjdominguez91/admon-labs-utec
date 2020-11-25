@extends ('layouts.app')
@section ('content')


<script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>

<div class="row mt-5">
    <div class="col">
        <h2 class="m-0 p-0">Resultados importación masiva de Horarios</h2>
    </div>
</div>
<hr>
<!-- Fin del Titulo -->
<!-- Inicio del main -->



    <!-- Registro horas -->
    @if(empty($horasEdit))
    <div class="card" id="cardRegistrar">
        <h5 class="card-header bg-light"> Ver comentarios</h5>
        <div class="card-body">
            <?php echo $mensaje; ?>
            <hr>
            <a href="{{ url('custom/'.$laboratorio) }}" class="btn btn-info">
                Regresar
            </a>
        </div>
    </div>
    @include('sweet::alert')
    @endif












<!-- fin del main -->



@endsection